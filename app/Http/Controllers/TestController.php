<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function initial($id=null)
    {
        if($id != null){
            $tests = Lesson::where('complete_status', '=', 3)->where('user_id', $id)->get();
        } else {
            $tests = Lesson::where('complete_status', '=', 3)->where('user_id', Auth::user()->id)->get();
        }

        return view('tests.index', ['title' => 'Tests Initial', 'tests' => $tests]);
    }

    public function non_complete($id=null)
    {
        if($id != null){
            $tests = Lesson::where('complete_status', '=', 4)->where('user_id', $id)->get();
        } else {
            $tests = Lesson::where('complete_status', '=', 4)->where('user_id', Auth::user()->id)->get();
        }

        return view('tests.non-completed', ['title' => 'Test Non-Completed', 'tests' => $tests]);
    }

    public function completed($id=null)
    {
        if($id != null){
            $tests = Lesson::where('complete_status', '=', 5)->where('user_id', $id)->get();
        } else {
            $tests = Lesson::where('complete_status', '=', 5)->where('user_id', Auth::user()->id)->get();
        }

        return view('tests.completed', ['title' => 'Test Completed', 'tests' => $tests]);
    }
}
