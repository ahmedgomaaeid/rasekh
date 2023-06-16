<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Notify;
use App\Models\Question;
use App\Models\SeenVideo;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function redirect($id)
    {
        checkIfStudentHasCourse($id);
        $lesson = Lesson::where('course_id', $id)->first();
        return redirect()->route('lesson', ['id' => $id, 'lesson' => $lesson->id]);
    }
    public function lesson($id, $lesson)
    {
        checkIfStudentHasCourse($id);
        $lessons = Lesson::where('course_id', $id)->where('status',1)->get();
        $seen_videos = SeenVideo::where('course_id', $id)->where('student_id', Auth::guard('student')->user()->id)->get('lesson_id');
        $lesson = Lesson::find($lesson);        
        $course = Course::find($id);
        $next_lesson_id = Lesson::where('course_id', $id)->where('status',1)->where('id', '>', $lesson->id)->min('id');
        $prev_lesson_id = Lesson::where('course_id', $id)->where('status',1)->where('id', '<', $lesson->id)->max('id');
        $firstZoomMeeting = $course->lastZoomMeeting()->first();
        $r_url = route('lesson', ['id' => $id, 'lesson' => $lesson->id]);
        if($lesson->type=="درس")
        {
            return view('student.video', compact('lessons', 'lesson', 'seen_videos', 'course', 'next_lesson_id', 'prev_lesson_id', 'firstZoomMeeting', 'r_url'));
        }else
        {
            $questions = Question::where('lesson_id', $lesson->id)->get();
            $result = SeenVideo::where('student_id', Auth::guard('student')->user()->id)->where('course_id', $id)->where('lesson_id', $lesson->id)->first();
            return view('student.video', compact('lessons', 'lesson', 'seen_videos', 'course', 'next_lesson_id', 'prev_lesson_id', 'questions', 'result', 'firstZoomMeeting', 'r_url'));
        }
    }
    public function lessonCompleted(Request $request)
    {
        checkIfStudentHasCourse($request->course_id);
        SeenVideo::updateOrCreate(
            ['student_id' => Auth::guard('student')->user()->id, 'course_id' => $request->course_id, 'lesson_id' => $request->lesson_id]
        );
        return redirect()->route('lesson',[$request->course_id,$request->next_lesson]);
    }
    public function sendQuiz(Request $request)
    {
        checkIfStudentHasCourse($request->course_id);
        $questions = Question::where('lesson_id', $request->lesson_id)->get();
        $correct = 0;
        foreach($questions as $question)
        {
            if($question->right_answer == $request->input($question->id))
            {
                $correct += $question->points;
            }
        }
        SeenVideo::updateOrCreate(
            ['student_id' => Auth::guard('student')->user()->id, 'course_id' => $request->course_id, 'lesson_id' => $request->lesson_id],
            ['quiz_result' => $correct]
        );
        Notify::create([
            'teacher_id' => $request->teacher_id,
            'text' => 'حصل الطالب '.Auth::guard('student')->user()->name.' على نتيجة'.$correct.'/'.$questions->sum('points').' فى كورس '.$request->lesson_name,
            'seen' => 0,
            'type' => '1'
        ]);
        return redirect()->route('lesson',[$request->course_id,$request->lesson_id]);
    }
    public function sendQuestion(Request $request)
    {
        checkIfStudentHasCourse($request->course_id);
        $this->validate($request, [
            'question' => 'required'
        ]);
        $mess = Message::firstOrCreate([
            'teacher_id' => $request->teacher_id,
            'student_id' => Auth::guard('student')->user()->id,
            'lesson_id' => $request->lesson_id,
            'teacher_read' => 0,
            'student_read' => 1
        ]);
        $mess -> updated_at = now();
        $mess -> save();
        Conversation::create([
            'message_id' => Message::where('teacher_id', $request->teacher_id)->where('student_id', Auth::guard('student')->user()->id)->where('lesson_id', $request->lesson_id)->first()->id,
            'sender_id' => Auth::guard('student')->user()->id,
            'sender_type' => 0,
            'text' => $request->question
        ]);
        return redirect()->back();
    }
    public function meeting()
    {
        return view('student.meeting');
    }
    public function meetingRedirect($id)
    {
        $meeting = ZoomMeeting::find($id);
        return view('student.zoom_open', compact('meeting'));
    }
}
