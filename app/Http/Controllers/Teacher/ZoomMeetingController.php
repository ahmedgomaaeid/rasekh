<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\ZoomApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ZoomIntegration;
use App\Models\ZoomMeeting;
use App\Models\ZoomToken;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require_once __DIR__ . '/zoom/zoom-backend/index.php';

class ZoomMeetingController extends Controller
{
    public function index()
    {
        //minus 1 hour from current time
        $zoomMeetings = ZoomMeeting::where('teacher_id', Auth::guard('teacher')->user()->id)->where('start_time', '>=', now())->orderBy('start_time', 'asc')->get();
        return view('teacher.zoom.index', compact('zoomMeetings'));
    }
    public function create()
    {
        $courses = Course::where('teacher_id', Auth::guard('teacher')->user()->id)->where('status', 1)->get();
        return view('teacher.zoom.create', compact('courses'));
    }
    public function store(Request $request)
    {
        if ($request->start_time < now()->subMinutes(60)) {
            return redirect()->back()->with('error', 'لا يمكنك انشاء محاضرة في الماضي يجب ان يكون موعدها بعد ساعة من الان على الاقل');
        } else {
            //convert date time from mm/dd/yyyy --:-- -- to Y-m-dTh:i:00
            $time = date('Y-m-d\TH:i:00', strtotime($request->start_time));
            //decress 2 hours from time
            $start_time = date('Y-m-d\TH:i:00', strtotime($time . "-3 hours")) . 'Z';
            $integration = ZoomIntegration::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
            $ref_number = generateRandomNumber();
            $topic = $request->lesson_name . ' - ' . $ref_number;

            $client = new Client(['base_uri' => 'https://api.zoom.us']);
            $user_zoom_token = ZoomToken::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
            if (!$user_zoom_token) {
                return redirect()->route('get.teacher.zoom-integration')->with('status', 'برجاء ربط حسابك بمنصة زووم اولا');
            }
            $arr_token = json_decode($user_zoom_token->access_token);
            $accessToken = $arr_token->access_token;
            try {
                $response = $client->request('POST', '/v2/users/me/meetings', [
                    "headers" => [
                        "Authorization" => "Bearer $accessToken"
                    ],
                    'json' => [
                        "topic" => $topic,
                        "type" => 2,
                        "start_time" => $start_time,
                        "duration" => "60",
                        "password" => "ahmedeid",
                        "settings" => [
                            "auto_recording" => "local",
                            "waiting_room" => false,
                            "join_before_host" => true,

                        ],
                    ],
                ]);
                $data = json_decode($response->getBody());
                $meeting_id = $data->id;
                $zoomMeeting = new ZoomMeeting();
                $zoomMeeting->meeting_id = $meeting_id;
                $zoomMeeting->start_url = $data->start_url;
                $zoomMeeting->teacher_id = Auth::guard('teacher')->user()->id;
                $zoomMeeting->course_id = $request->course_id;
                $zoomMeeting->lesson_name = $request->lesson_name;
                $zoomMeeting->ref_num = $ref_number;
                $zoomMeeting->start_time = $request->start_time;
                $zoomMeeting->sdk_key = $integration->sdk_client_id;
                $zoomMeeting->save();
                return redirect()->route('get.teacher.zoom-meeting')->with('success', 'تم إنشاء البث بنجاح');
            } catch (Exception $e) {
                if (401 == $e->getCode()) {
                    $refresh_token = $arr_token->refresh_token;

                    $client = new Client(['base_uri' => 'https://zoom.us']);
                    $response = $client->request('POST', '/oauth/token', [
                        "headers" => [
                            "Authorization" => "Basic " . base64_encode(Auth::guard('teacher')->user()->zoom_integration->oauth_client_id . ":" . Auth::guard('teacher')->user()->zoom_integration->oauth_client_secret),
                        ],
                        'form_params' => [
                            "grant_type" => "refresh_token",
                            "refresh_token" => $refresh_token
                        ],
                    ]);
                    ZoomToken::UpdateOrCreate(
                        ['teacher_id' => Auth::guard('teacher')->user()->id],
                        ['access_token' => $response->getBody()]
                    );
                    //retry the request
                    return $this->store($request);
                } else {
                    $zoom_token = ZoomToken::where('teacher_id', Auth::guard('teacher')->user()->id);
                    if ($zoom_token) {
                        $zoom_token->delete();
                    }
                    return redirect()->route('get.teacher.zoom-integration')->with('status', 'حدث خطأ ما برجاء التاكد من البيانات الموجودة و اعادة الاتصال');
                }
            }
        }
    }
    public function connect()
    {
        $url = "https://zoom.us/oauth/authorize?response_type=code&client_id=" . Auth::guard('teacher')->user()->zoom_integration->oauth_client_id . "&redirect_uri=" . route('post.teacher.zoom-meeting.callback');
        return redirect($url);
    }
    public function callback()
    {
        try {
            $client = new Client(['base_uri' => 'https://zoom.us']);
            $response = $client->request('POST', '/oauth/token', [
                "headers" => [
                    "Authorization" => "Basic " . base64_encode(Auth::guard('teacher')->user()->zoom_integration->oauth_client_id . ":" . Auth::guard('teacher')->user()->zoom_integration->oauth_client_secret),
                ],
                'form_params' => [
                    "grant_type" => "authorization_code",
                    "code" => $_GET['code'],
                    "redirect_uri" => route('post.teacher.zoom-meeting.callback')
                ],
            ]);
            //$token = json_decode($response->getBody()->getContents(), true);
            ZoomToken::UpdateOrCreate(
                ['teacher_id' => Auth::guard('teacher')->user()->id],
                ['access_token' => $response->getBody()->getContents()]
            );
            return redirect()->route('get.teacher.zoom-integration')->with('success', 'تم ربط حسابك بنجاح');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function destroy($id)
    {
        $zoomMeeting = ZoomMeeting::find($id);
        $client = new Client(['base_uri' => 'https://api.zoom.us']);
        $arr_token = json_decode(ZoomToken::where('teacher_id', Auth::guard('teacher')->user()->id)->first()->access_token);
        $accessToken = $arr_token->access_token;
        $response = $client->request('DELETE', '/v2/meetings/' . $zoomMeeting->meeting_id, [
            "headers" => [
                "Authorization" => "Bearer $accessToken"
            ]
        ]);
        $zoomMeeting->delete();
        return redirect()->route('get.teacher.zoom-meeting')->with('success', 'تم حذف البث بنجاح');
    }
    public function meeting()
    {
        return view('teacher.zoom.meeting');
    }
    public function meetingRedirect($id)
    {
        $meeting = ZoomMeeting::find($id);
        return view('teacher.zoom.zoom_open', compact('meeting'));
    }


    public function webhook($data)
    {
        $zoom_token = new ZoomMeeting();
        $zoom_token->access_token = $data;
        $zoom_token->teacher_id = Auth::guard('teacher')->user()->id;
        $zoom_token->save();
        return $data;
    }
    public function upload()
    {
        return view('teacher.zoom.upload');
    }
    public function uploadStore(Request $request)
    {
        $meetings = ZoomMeeting::where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        foreach ($meetings as $meeting) {
            //check if meeting name exist between text
            if (str_contains($meeting->ref_num, $request->folder_name)) {
                dd('asd');
                $lesson_name = $meeting->lesson_name;
                $course_id = $meeting->course_id;
                $file_extension = $request->file('folder')->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $request->file('folder')->move('assets/videos', $file_name);
                $lesson = new Lesson();
                $lesson->name = $lesson_name;
                $lesson->course_id = $course_id;
                $lesson->publisher_type = 1;
                $lesson->video = $file_name;
                $lesson->type = 0;
                $lesson->status = 1;
                $lesson->save();
                return redirect()->route('get.teacher.lesson')->with('success', 'تم اضافة الدرس بنجاح');
            }
        }
    }
}
