<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\ZoomApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ZoomIntegration;
use App\Models\ZoomMeeting;
use App\Models\ZoomToken;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
require_once __DIR__.'/zoom/zoom-backend/index.php';

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
        if($request->start_time < now()->subMinutes(60))
        {
            return redirect()->back()->with('error', 'لا يمكنك انشاء محاضرة في الماضي يجب ان يكون موعدها بعد ساعة من الان على الاقل');
        }else
        {
            //convert date time from mm/dd/yyyy --:-- -- to Y-m-dTh:i:00
            $time = date('Y-m-d\TH:i:00', strtotime($request->start_time));
            //decress 2 hours from time
            $start_time = date('Y-m-d\TH:i:00', strtotime($time . "-3 hours")).'Z';
            $integration = ZoomIntegration::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
            $topic = 'محاضرة المعلم ' . Auth::guard('teacher')->user()->name;
            
            $client = new Client(['base_uri' => 'https://api.zoom.us']);
            $arr_token = json_decode(ZoomToken::where('teacher_id', Auth::guard('teacher')->user()->id)->first());
            dd($arr_token);
            $accessToken = $arr_token->access_token;
            try{
                $response = $client->request('POST', '/v2/users/me/meetings', [
                    "headers" => [
                        "Authorization" => "Bearer $accessToken"
                    ],
                    'json' => [
                        "topic" => $topic,
                        "type" => 2,
                        "start_time" => $start_time,
                        "duration" => "60",
                        "auto_recording" => "local",
                        "password" => "ahmedeid"
                    ],
                ]);
                $data = json_decode($response->getBody());      
                $meeting_id = $data->id;
                $zoomMeeting = new ZoomMeeting();
                $zoomMeeting->meeting_id = $meeting_id;
                $zoomMeeting->teacher_id = Auth::guard('teacher')->user()->id;
                $zoomMeeting->course_id = $request->course_id;
                $zoomMeeting->start_time = $request->start_time;
                $zoomMeeting->sdk_key = $integration->sdk_client_id;
                $zoomMeeting->save();
                return redirect()->route('get.teacher.zoom-meeting')->with('success', 'تم إنشاء البث بنجاح');

            }catch(Exception $e) {
                if( 401 == $e->getCode() ) {
                    $refresh_token = $arr_token->refresh_token;
         
                    $client = new Client(['base_uri' => 'https://zoom.us']);
                    $response = $client->request('POST', '/oauth/token', [
                        "headers" => [
                            "Authorization" => "Basic ". base64_encode(Auth::guard('teacher')->user()->zoom_integration->oauth_client_id . ":" . Auth::guard('teacher')->user()->zoom_integration->oauth_client_secret),
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
                    $this->store($request);
                } else {
                    return $e->getMessage();
                }
            }
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://api.zoom.us/v2/users/" . $integration->email,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_SSL_VERIFYHOST => 0,
            //     CURLOPT_SSL_VERIFYPEER => 0,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "GET",
            //     CURLOPT_HTTPHEADER => array(
            //     "Authorization: Bearer ".$integration->jwt,
            //     "Content-Type: application/json",
            //     "cache-control: no-cache"
            //     ),
            // ));
            // $response = curl_exec($curl);
            // $zoomUserId = json_decode($response)->users[0]->id;
            
            // $zoom = new ZoomApiHelper();        
            // $meeting_id = json_decode($zoom->createZoomMeeting(['integration' => $integration, 'topic' => $topic, 'start_time' => $start_time, 'zoomUserId' => $zoomUserId]))->id;
            // $zoomMeeting = new ZoomMeeting();
            // $zoomMeeting->meeting_id = $meeting_id;
            // $zoomMeeting->teacher_id = Auth::guard('teacher')->user()->id;
            // $zoomMeeting->course_id = $request->course_id;
            // $zoomMeeting->start_time = $request->start_time;
            // $zoomMeeting->oauth_key = $integration->client_id;
            // $zoomMeeting->save();
            // return redirect()->route('get.teacher.zoom-meeting')->with('success', 'تم إنشاء البث بنجاح');
        }
    }
    public function connect()
    {
        $url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".Auth::guard('teacher')->user()->zoom_integration->oauth_client_id."&redirect_uri=".route('post.teacher.zoom-meeting.callback');
        return redirect($url);
    }
    public function callback()
    {
        try{
            $client = new Client(['base_uri' => 'https://zoom.us']);
            $response = $client->request('POST', '/oauth/token',[
                "headers" => [
                    "Authorization" => "Basic ". base64_encode(Auth::guard('teacher')->user()->zoom_integration->oauth_client_id . ":" . Auth::guard('teacher')->user()->zoom_integration->oauth_client_secret),
                ],
                'form_params' => [
                    "grant_type" => "authorization_code",
                    "code" => $_GET['code'],
                    "redirect_uri" => route('post.teacher.zoom-meeting.callback')
                ],
            ]);
            $token = json_decode($response->getBody()->getContents(), true);
            ZoomToken::UpdateOrCreate(
                ['teacher_id' => Auth::guard('teacher')->user()->id],
                ['access_token' => $token['access_token'], 'refresh_token' => $token['refresh_token']]
            );
            return redirect()->route('get.teacher.zoom-meeting')->with('success', 'تم ربط حسابك بنجاح');
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function destroy($id)
    {
        $zoomMeeting = ZoomMeeting::find($id);
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
}
