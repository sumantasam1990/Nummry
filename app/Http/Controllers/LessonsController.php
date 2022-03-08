<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
