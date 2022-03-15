<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ResumePause;
use App\Models\TestTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    public function index($id=null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if($id != null){
            $lessons = Lesson::where('complete_status', 0)->where('user_id', $id)->get();
        } else {
            $lessons = Lesson::where('complete_status', 0)->where('user_id', Auth::user()->id)->get();
        }

        return view('lessons.index', ['title' => 'Learning Exercises', 'lessons' => $lessons]);
    }

    public function completed($id=null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if($id != null){
            $lessons = Lesson::where('complete_status', 1)->where('user_id', $id)->get();
        } else {
            $lessons = Lesson::where('complete_status', 1)->where('user_id', Auth::user()->id)->get();
        }

        return view('lessons.completed', ['title' => 'Learning Exercises Completed', 'lessons' => $lessons]);
    }

    public function results($id)
    {
        $testtimes = TestTime::whereLessonId($id)->first();
        // start algo
        $resume_pause = ResumePause::whereLessonId($id)->get();

        $lesson = Lesson::whereId($id)->select('datetime', 'user_id', 'id')->first();
        $user = User::whereId($lesson->user_id)->select('name')->first();

        $results = DB::table('questions')
            ->join('results', 'questions.id', '=', 'results.question_id')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->where('results.lesson_id', '=', $id)
            ->select('*', 'questions.id as qidd')
            ->get();

        if(count($results) === 0) {
            return back()->with('msg', 'No result found. Please check back later.');
        }

        return view('lessons.results', ['title' => 'Result', 'results' => $results, 'lesson'=>$lesson, 'user'=>$user, 'testtimes' => $testtimes]);
    }
}
