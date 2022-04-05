<?php

namespace App\Http\Controllers;

use App\Mail\AdminNotification;
use App\Mail\InviteTutor;
use App\Models\TeacherStudent;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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
            return redirect(route('dashboard'));
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
            'phone' => 'required',
            //'g-recaptcha-response' => 'required|recaptchav3:custom-registration,0.5'
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

        $mailArray = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => 'You Have A New Member Join On Nummry',
            'msg' => "You have a new member join on Nummry."
        ];

        event(new Registered($user));

        Mail::to(env('ADMIN_EMAIL'))->send(new AdminNotification($mailArray));



        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification. Please check your "SPAM" folder also.</p> <p>Thank you</p> <p>Team Nummry</p>');
    }

    public function create(array $data)
    {
        return User::create([
            'promo' => $data['promo'],
            'referral' => $data['referral'],
            'user_type' => $data['teacher_txt'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'parent_name' => $data['parent_name'],
            'grade' => $data['grade'],
            'phone' => $data['phone']
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

    public function teacher($email, $stud_email, $unq=null)
    {
        if($unq != null) {
            $teacherExist = User::whereEmail($email)->select('id')->get();

            if(count($teacherExist) > 0) {

                $studentID = User::whereEmail($stud_email)->select('id')->first();

                $teacherStudent = new TeacherStudent;
                $teacherStudent->student_id = $studentID->id;
                $teacherStudent->teacher_id = $teacherExist[0]->id;
                $teacherStudent->save();

                return redirect(route('teacher.dashboard'))->with('msg', 'You have accepted the invitation.');

            } else {
                return view('auth.register', ['title' => 'Signup Teacher', 'email' => $email, 'stud_email' => $stud_email]);
            }
        } else {
            return abort('403');
        }


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

    public function invitation()
    {
        return view('auth.invitation', ['title' => 'Invitation']);
    }

    public function invitation_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $mailArray = [
            'name' => $request->name,
            'url' => route('register.teacher', [$request->email, Auth::user()->email, md5(uniqid() . time() . date('Y-H:i A'))]),
            's_name' => Auth::user()->name
        ];

        Mail::to($request->email)->send(new InviteTutor($mailArray));

        return back()->with('msg', 'Invitation has been sent successfully.');
    }

}
