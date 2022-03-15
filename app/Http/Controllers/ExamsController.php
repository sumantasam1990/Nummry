<?php

namespace App\Http\Controllers;

use App\Mail\AdminNotification;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Result;
use App\Models\ResumePause;
use App\Models\TestTime;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExamsController extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $question = Question::where('lesson_id', $id)->where('user_id', Auth::user()->id)->where('status', 0)->get();

        if(count($question) === 0) {
            return redirect(route('dashboard'))->with('You have already completed this lesson successfully.');
        }


        $pause_resume_chk = Lesson::whereId($id)->where('pause_timer', '=', '1')->select('pause_timer')->get();

        //checking start time of the test
        $testtime = TestTime::whereLessonId($id)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $question[0]->id)->get();

        if(count($testtime) === 0) {
            $testtime = new TestTime;
            $testtime->start_time = date("Y-m-d H:i:s");
            $testtime->user_id = Auth::user()->id;
            $testtime->lesson_id = $id;
            $testtime->question_id = $question[0]->id;
            $testtime->save();
        }

        $lesson = Lesson::whereId($id)->select('id', 'datetime')->first();

        if (count($question) > 0) {
            return view('exam.index', ['title' => 'Exam Portal', 'question' => $question[0], 'lesson' => $lesson, 'testtime' => $testtime, 'pause_resume_chk' => $pause_resume_chk]);
        } else {
            return back()->with('info','You have already completed this lesson.');
        }

    }

    public function submit_answer(Request $request): \Illuminate\Http\JsonResponse
    {


        $request->validate([
            'hd_q_id' => 'required',
        ]);


        $result = new Result;

        $result->question_id = $request->hd_q_id;
        $result->time = date('Y-m-d H:i:s');
        $result->user_id = Auth::user()->id;
        $result->lesson_id = $request->less_id;
        if($request->mcq) {
            $result->answer_user = $request->mcq;
        } else {
            $result->answer_user = $request->ans;
        }


        $result->save();

        // End time timer
        TestTime::where('lesson_id', $request->less_id)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $request->hd_q_id)->update(['end_time' => date('Y-m-d H:i:s')]);
        // question id die update krte hbe
        // end timer

        $answer = Answer::whereQuestionId($request->hd_q_id)->select('correct_ans')->first();

        //update question table
        Question::where('id', '=', $request->hd_q_id)->update(['status' => 1]);

        if($answer->correct_ans == $request->ans || $answer->correct_ans == $request->mcq)
        {
            $question = Question::where('lesson_id', $request->less_id)->where('user_id', Auth::user()->id)->where('status', 0)->get();

            if(count($question) > 0) {
                // start time timer
                $testtime_insert = new TestTime;
                $testtime_insert->user_id = Auth::user()->id;
                $testtime_insert->lesson_id = $request->less_id;
                $testtime_insert->start_time = date('Y-m-d H:i:s');
                $testtime_insert->question_id = $question[0]->id;
                $testtime_insert->save();
                // end
            }


            if(count($question) > 0) {
                $returnHTML = view('exam.ajax', ['title' => 'Exam Portal', 'question' => $question[0]])->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML, 'correct'=>true));
            } else {
                //checking end time of the test

//                TestTime::where('lesson_id', $request->less_id)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $request->hd_q_id)->update(['end_time' => date('Y-m-d H:i:s')]);

                // mark lesson completed
                $lessons = Lesson::whereId($request->less_id)->select('complete_status')->first();

                if ($lessons->complete_status === 0) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 1]);
                } elseif ($lessons->complete_status === 3) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 5]);
                } elseif ($lessons->complete_status === 4) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 5]);
                }

                $mailArray = [
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'subject' => Auth::user()->name . " has been completed his/her lesson.",
                    'msg' => Auth::user()->name . " has been completed a lesson successfully."
                ];

                //Mail::to(env('ADMIN_EMAIL'))->send(new AdminNotification($mailArray));

                return response()->json(array('success' => true, 'redirect'=>route('lessons.not-complete')));
            }

        } else {
            $question = Question::where('lesson_id', $request->less_id)->where('user_id', Auth::user()->id)->where('status', 0)->get();

            if(count($question) > 0) {
                // start time timer
                $testtime_insert2 = new TestTime;
                $testtime_insert2->user_id = Auth::user()->id;
                $testtime_insert2->lesson_id = $request->less_id;
                $testtime_insert2->start_time = date('Y-m-d H:i:s');
                $testtime_insert2->question_id = $question[0]->id;
                $testtime_insert2->save();
                // end
            }


            if(count($question) > 0) {
                $returnHTML = view('exam.ajax', ['title' => 'Exam Portal', 'question' => $question[0]])->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML, 'correct'=> false));
            } else {
                //checking end time of the test

//                TestTime::where('lesson_id', $request->less_id)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $request->hd_q_id)->update(['end_time' => date('Y-m-d H:i:s')]);

                // mark lesson completed
                $lessons = Lesson::whereId($request->less_id)->select('complete_status')->first();

                if ($lessons->complete_status === 0) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 1]);
                } elseif ($lessons->complete_status === 3) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 5]);
                } elseif ($lessons->complete_status === 4) {
                    Lesson::where('id', $request->less_id)->where('user_id', '=', Auth::user()->id)->update(['complete_status' => 5]);
                }

                $mailArray = [
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'subject' => Auth::user()->name . " has been completed his/her lesson.",
                    'msg' => Auth::user()->name . " has been completed a lesson successfully."
                ];

                //Mail::to(env('ADMIN_EMAIL'))->send(new AdminNotification($mailArray));

                return response()->json(array('success' => true, 'redirect'=>route('lessons.not-complete')));
            }
        }



    }

    public function timer(Request $request)
    {
        $question = Question::where('lesson_id', $request->time_less)->where('user_id', Auth::user()->id)->where('status', 0)->get();

        if(count($question) > 0) {
            $testtimee = \App\Models\TestTime::whereLessonId($request->time_less)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $question[0]->id)->first();

            $datetime1 = new DateTime();
            $datetime2 = new DateTime($testtimee->start_time);
            $interval = $datetime1->diff($datetime2);
            //$elapsed = $interval->format('%y years %m months %d days %h hours %i minutes %s seconds');
            $elapsed = $interval->format('%h hours %i minutes %s seconds');
            return response()->json(array('time' => $elapsed));
        } else {
            return response()->json(array('time' => "nan"));
        }

    }

    // Tests code

    public function index_test($id)
    {
        $question = Question::where('lesson_id', $id)->where('user_id', Auth::user()->id)->where('status', 0)->get();

        if(count($question) === 0) {
            return redirect(route('dashboard'))->with('You have already completed this lesson successfully.');
        }


        $pause_resume_chk = Lesson::whereId($id)->where('pause_timer', '=', '1')->select('pause_timer')->get();

        //checking start time of the test
        $testtime = TestTime::whereLessonId($id)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $question[0]->id)->get();

        if(count($testtime) === 0) {
            $testtime = new TestTime;
            $testtime->start_time = date("Y-m-d H:i:s");
            $testtime->user_id = Auth::user()->id;
            $testtime->lesson_id = $id;
            $testtime->question_id = $question[0]->id;
            $testtime->save();
        }

        $lesson = Lesson::whereId($id)->select('id', 'datetime')->first();

        if (count($question) > 0) {
            return view('exam.index', ['title' => 'Exam Portal', 'question' => $question[0], 'lesson' => $lesson, 'testtime' => $testtime, 'pause_resume_chk' => $pause_resume_chk]);
        } else {
            return back()->with('info','You have already completed this lesson.');
        }
    }

    public function index_test_old($id)
    {
        //checking start time of the test
        $testtime = TestTime::whereLessonId($id)->where('user_id', '=', Auth::user()->id)->get();

        if(count($testtime) === 0) {
            $testtime = new TestTime;

            $testtime->start_time = date("Y-m-d H:i:s");
            $testtime->user_id = Auth::user()->id;
            $testtime->lesson_id = $id;

            $testtime->save();
        }

        $question = Question::where('lesson_id', $id)->where('user_id', Auth::user()->id)->where('status', 0)->get();

        $lesson = Lesson::whereId($id)->select('id', 'datetime')->first();

        if (count($question) > 0) {
            return view('exam.index', ['title' => 'Exam Portal', 'question' => $question[0], 'lesson' => $lesson, 'testtime' => $testtime]);
        } else {
            return back()->with('info','You have already completed this lesson.');
        }
    }

    public function pause_timer_ajax(Request $request)
    {
        $resumepause = new ResumePause;

        $resumepause->pause = date('Y-m-d H:i:s');
        $resumepause->lesson_id = $request->str_l;
        $resumepause->user_id = Auth::user()->id;
        $resumepause->question_id = $request->question_id;

        $resumepause->save();

        Lesson::where('id', $request->str_l)->where('user_id', '=', Auth::user()->id)->update(['pause_timer' => 1]);

        return response()->json(array('pr' => back()));
    }

    public function resume_timer_ajax(Request $request)
    {
        ResumePause::where('lesson_id', $request->str_l)->where('user_id', '=', Auth::user()->id)->where('question_id', '=', $request->question_id)->where('resume', '=', null)->update(['resume' => date('Y-m-d H:i:s')]);

        Lesson::where('id', $request->str_l)->where('user_id', '=', Auth::user()->id)->update(['pause_timer' => 0]);

        return response()->json(array('pr' => back()));
    }
}
