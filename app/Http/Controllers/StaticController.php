<?php

namespace App\Http\Controllers;

use App\Mail\InviteTutor;
use App\Mail\TeacherPromotion;
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

    public function teacher_promotion()
    {
        return view('static.teacher_promotion', ['title' => 'Teacher Promotion - Nummry']);
    }

    public function teacher_promotion_send_email(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'insta' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $mailArray = [
            'name' => $request->name,
            'email' => $request->email,
            'insta' => $request->insta,
            'phone' => $request->phone
        ];

        Mail::to(env('ADMIN_EMAIL'))->send(new TeacherPromotion($mailArray));

        return back()->with('msg', 'Thank you for contacting us.');
    }

    public function franchise_details()
    {
        return view('static.franchise_details', ['title' => 'Franchise Details']);
    }

    public function franchise_value()
    {
        return view('static.franchise_values', ['title' => 'Franchise Values']);
    }

}
