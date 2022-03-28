<?php

use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// authentications
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('signup/{token?}', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('teacher/{email}/{stud_email}/{unq}', [LoginController::class, 'teacher'])->name('register.teacher');


Route::middleware(['auth'])->prefix('u')->group(function () {
    Route::get('dashboard/{id?}', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::get('lessons/not-completed/{id?}', [\App\Http\Controllers\LessonsController::class, 'index'])->name('lessons.not-complete');

    Route::get('signout', [LoginController::class, 'logout'])->name('signout'); // Signout

    Route::get('comparisons/{id?}', [\App\Http\Controllers\ComparisonController::class, 'index'])->name('comparisons');

    Route::get('comparisons/stats/{id}/{idd?}', [\App\Http\Controllers\ComparisonController::class, 'stats'])->name('stats');

    Route::get('lessons/completed/{id?}', [\App\Http\Controllers\LessonsController::class, 'completed'])->name('lessons.complete');

    Route::get('lessons/results/{id}', [\App\Http\Controllers\LessonsController::class, 'results'])->name('lessons.results');

    Route::get('tests/initial/{id?}', [\App\Http\Controllers\TestController::class, 'initial'])->name('test.initial');

    Route::get('tests/non-complete/{id?}', [\App\Http\Controllers\TestController::class, 'non_complete'])->name('test.non-complete');

    Route::get('tests/completed/{id?}', [\App\Http\Controllers\TestController::class, 'completed'])->name('test.complete');

    Route::get('comparisons/time-progress/{id}/{stat_id}', [\App\Http\Controllers\ComparisonController::class, 'time_progress'])->name('comp.time.progress');

    Route::get('comparisons/time-progress/metrics/{id}/{time}', [\App\Http\Controllers\ComparisonController::class, 'time_progress_metrics'])->name('comp.time.progress.metrics');




});

Route::middleware(['auth'])->prefix('u/exam')->group(function () {
    Route::get('exam-portal/{id}/{token}', [\App\Http\Controllers\ExamsController::class, 'index'])->name('exam-portal');

    Route::post('submit-answer', [\App\Http\Controllers\ExamsController::class, 'submit_answer'])->name('submit_answer');

    Route::post('timer', [\App\Http\Controllers\ExamsController::class, 'timer'])->name('timer');

    Route::post('pause-timer-ajax', [\App\Http\Controllers\ExamsController::class, 'pause_timer_ajax'])->name('pause.timer.ajax');

    Route::post('resume-timer-ajax', [\App\Http\Controllers\ExamsController::class, 'resume_timer_ajax'])->name('resume.timer.ajax');

    // tests

    Route::get('exam-portal-test/{id}', [\App\Http\Controllers\ExamsController::class, 'index_test'])->name('exam-portal-test');

});



//Admin

Route::middleware(['auth'])->prefix('administrator')->group(function () {
    Route::get('admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dash');

    Route::post('admin/add-lesson', [\App\Http\Controllers\AdminController::class, 'add_lesson'])->name('admin.add.lesson');

    Route::get('admin/lesson-view', [\App\Http\Controllers\AdminController::class, 'lesson_view'])->name('admin.lesson.view');

    Route::get('admin/question-view/{id}', [\App\Http\Controllers\AdminController::class, 'question_view'])->name('admin.question.view');

    Route::get('admin/results-view/{id}', [\App\Http\Controllers\AdminController::class, 'results'])->name('admin.results.view');

    Route::get('admin/add-question/{lid}', [\App\Http\Controllers\AdminController::class, 'add_question'])->name('admin.add.question');

    Route::post('admin/add-question-post', [\App\Http\Controllers\AdminController::class, 'add_question_post'])->name('admin.add.question.post');

    Route::get('admin/add-question-image/{lid}', [\App\Http\Controllers\AdminController::class, 'add_question_image'])->name('admin.add.question.image');

    Route::post('admin/add-question-post/image', [\App\Http\Controllers\AdminController::class, 'add_question_post_image'])->name('admin.add.question.post.image');

    Route::get('admin/add-comparison', [\App\Http\Controllers\AdminController::class, 'add_comparison'])->name('admin.add.comparison');

    Route::post('admin/ajax-comparison-post', [\App\Http\Controllers\AdminController::class, 'ajax_comparison'])->name('admin.ajax.comparison.post');

    Route::post('admin/comp-post', [\App\Http\Controllers\AdminController::class, 'comparison_post'])->name('admin.comparison.post');

    Route::get('admin/view-comparison', [\App\Http\Controllers\AdminController::class, 'view_comparison'])->name('admin.view.comparison');

    Route::get('admin/view-stats/{id}', [\App\Http\Controllers\AdminController::class, 'view_stats'])->name('admin.view.stats');

    Route::get('admin/add-test', [\App\Http\Controllers\AdminController::class, 'add_test'])->name('admin.add.test');

    Route::post('admin/add-test/post', [\App\Http\Controllers\AdminController::class, 'add_test_post'])->name('admin.add.test.post');

    Route::get('admin/test-view', [\App\Http\Controllers\AdminController::class, 'test_view'])->name('admin.test.view');

    Route::get('admin/add-progress-title/{stat_id}', [\App\Http\Controllers\AdminController::class, 'add_progress_title'])->name('admin.progress.title');

    Route::post('admin/add-progress-title-post', [\App\Http\Controllers\AdminController::class, 'add_progress_title_post'])->name('admin.progress.title.post');

    Route::get('admin/view-progress-title/{stat_id}', [\App\Http\Controllers\AdminController::class, 'view_progress_title'])->name('admin.view.progress.title');

    Route::get('admin/add-progress-metrics/{title_id}/{stat_id}', [\App\Http\Controllers\AdminController::class, 'add_progress_metrics'])->name('admin.add.progress.metrics');

    Route::post('admin/add-progress-metrics/post', [\App\Http\Controllers\AdminController::class, 'add_progress_metrics_post'])->name('admin.add.progress.metrics.post');

    Route::get('admin/view-progress-metrics/{title_id}/{stat_id}', [\App\Http\Controllers\AdminController::class, 'view_progress_metrics'])->name('admin.view.progress.metrics');

    Route::get('admin/users', [\App\Http\Controllers\AdminController::class, 'users_list'])->name('admin.users');

    Route::get('admin/question/delete/{id}', [\App\Http\Controllers\AdminController::class, 'question_delete'])->name('admin.question.delete');


});


// teacher

Route::get('t/dashboard', [LoginController::class, 'teacher_dashboard'])->name('teacher.dashboard')->middleware('auth');
Route::get('t/invitation', [LoginController::class, 'invitation'])->name('teacher.invitation')->middleware('auth');
Route::post('t/invitation/post', [LoginController::class, 'invitation_post'])->name('teacher.invitation.post')->middleware('auth');


// email verification routes
Route::get('/email/verify', function () {
    //return view('auth.verify-email');
    return redirect('/signout');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Forget password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status), 'msg' => "An email has been sent to you where you can reset your password."])
        : back()->withErrors(['email' => __($status), 'err' => 'Please check your Email ID.']);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


// Static pages

Route::get('/', [\App\Http\Controllers\StaticController::class, 'home'])->name('static.home');

Route::get('/data-points', [\App\Http\Controllers\StaticController::class, 'data_points'])->name('static.data.points');

Route::get('/privacy', [\App\Http\Controllers\StaticController::class, 'privacy'])->name('privacy');

Route::get('/terms', [\App\Http\Controllers\StaticController::class, 'terms'])->name('terms');

Route::get('/teacher-promotion', [\App\Http\Controllers\StaticController::class, 'teacher_promotion'])->name('teacher.promotion');

Route::post('/teacher-promotion-post-send-email', [\App\Http\Controllers\StaticController::class, 'teacher_promotion_send_email'])->name('teacher.promotion.post');

Route::get('/franchise/details', [\App\Http\Controllers\StaticController::class, 'franchise_details'])->name('franchise.details');

Route::get('/franchise/value', [\App\Http\Controllers\StaticController::class, 'franchise_value'])->name('franchise.value');

//Franchisee

Route::get('/franchise/login', function () {
    return view('franchise.login', ['title' => 'Franchise Login']);
})->name('franchise.login');

Route::post('/franchise/login/post', function () {
    return back()->with('err', 'Incorrect login, please try again');
})->name('franchise.login.post');

Route::get('/franchise/forget/password', function () {
    return view('franchise.forget-password', ['title' => 'Franchise Forgot Password']);
})->name('franchise.forgot.password');

Route::post('/franchise/forget/password/post', function () {
    return back()->with('err', 'If your email is in our system; you will receive a password reset email.');
})->name('franchise.forgot.password.post');

Route::get('/franchise/signup', function () {
    return view('franchise.signup', ['title' => 'Franchise Signup']);
})->name('franchise.signup');

Route::post('/franchise/signup/post', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
//        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
//        'password_confirmation' => 'min:6',
        'phone' => 'required',
        'business_name' => 'required'
    ]);

    try {
        $insert = new \App\Models\FranchiseUsers;

        $insert->name = $request->name;
        $insert->business = $request->business_name;
        $insert->email = $request->email;
        //$insert->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $insert->password = \Illuminate\Support\Facades\Hash::make(uniqid() . time() . $request->email);
        $insert->phone = $request->phone;

        $insert->save();

        return back()->with('msg', 'You have successfully created your Franchise Account.');
    } catch (\Exception $ex) {
        return abort('500');
        //return back()->with('err', 'Your email id is already exist into our system. Please try again.');
    }




})->name('franchise.signup.post');
