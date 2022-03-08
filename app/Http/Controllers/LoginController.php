<?php

namespace App\Http\Controllers;

use App\Models\TeacherStudent;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login', ["title" => "Login"]);
    }

    public function authenticate(Request $request): \Illuminate\Http\RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            if (Auth::user()->user_type == 'Administrator')
            {
                return redirect()->intended('administrator/admin/dashboard');
            } elseif (Auth::user()->user_type == 'teacher') {
                return redirect()->intended('t/dashboard');
            } else {
                return redirect()->intended('u/dashboard');
                // Checking if invitation cookie is alive or not
//                if(Cookie::has('invite_agent_token') && !empty(Cookie::get('invite_agent_token'))) {
//                    return redirect()->intended('accept-invitation/' . Cookie::get('invite_agent_token'));
//                } elseif(Cookie::has('invite_buyer_token') && !empty(Cookie::get('invite_buyer_token'))) {
//                    return redirect()->intended('accept-invitation-buyer/' . Cookie::get('invite_buyer_token'));
//                } else {
//                    return redirect()->intended('dashboard');
//                }

            }


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.register', ["title" => "Create an account"]);
    }


    public function customRegistration(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
//            'user_type' => 'required|in:Buyer,Agent'

        ]);

        $data = $request->all();

       // dd($data);

        $user = $this->create($data);

        if($user) {
            if($user->user_type == 'Buyer') {
                $user->assignRole('buyer');
            }
        }

        // student teacher relationship

        if($request->teacher_txt == 'teacher') {
            $user_id = User::whereEmail($request->email)->select('id')->first();
            $student_id = User::whereEmail($request->student_email)->select('id')->first();

            $teacherstudent = new TeacherStudent;

            $teacherstudent->teacher_id = $user_id->id;
            $teacherstudent->student_id = $student_id->id;

            $teacherstudent->save();
        }

        event(new Registered($user));

        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification</p> <p>Thank you</p> <p>Team Nummry</p>');
    }

    public function create(array $data)
    {
        return User::create([
            'user_type' => $data['teacher_txt'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard($id=null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        return view('dashboard.index', ['title' => $user->name . "'s Dashboard", 'u_id' => $id]);
    }

    public function logout(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function teacher($email, $stud_email)
    {
        return view('auth.register', ['title' => 'Signup Teacher', 'email' => $email, 'stud_email' => $stud_email]);
    }

    public function teacher_dashboard()
    {
        $students = DB::table('users', 'u')
            ->join('teacher_student as ts', 'u.id', '=', 'ts.student_id')
            ->where('ts.teacher_id', '=', Auth::user()->id)
            ->select('u.id as uid', 'u.name')
            ->get();

        return view('dashboard.teacher-dashboard', ['title' => 'Teacher Dashboard', 'students' => $students]);
    }

}
