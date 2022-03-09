<?php

namespace App\Http\Controllers;

use App\Mail\InviteTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StaticController extends Controller
{
    public function home()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('static.home', ['title' => 'Welcome to Nummry']);
    }

    public function data_points()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('static.data_points', ['title' => 'Data Points - Nummry']);
    }

    public function privacy()
    {
        return view('static.privacy', ['title' => 'Privacy - Nummry']);
    }

    public function terms()
    {
        return view('static.terms', ['title' => 'Terms - Nummry']);
    }

}
