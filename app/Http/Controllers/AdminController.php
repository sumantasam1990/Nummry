<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comparison;
use App\Models\ComparisonCategory;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\ResumePause;
use App\Models\Stat;
use App\Models\StatProgress;
use App\Models\StatProgressTitle;
use App\Models\TestTime;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.dashboard', ['title' => 'Dashboard - Administrator', 'users' => $users]);
    }

    public function add_lesson(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'user' => 'required'
        ]);

        $lesson = new Lesson;

        $lesson->name = 'test';
        $lesson->user_id = $request->user;
        $lesson->datetime = date('Y-m-d H:i:s', strtotime($request->date));
        $lesson->token = md5(uniqid() . time() );

        $lesson->save();

        return back()->with('msg', 'Lesson added.');
    }

    public function lesson_view()
    {
        $lessons = DB::table('lessons')
            ->join('users', 'lessons.user_id', '=', 'users.id')
            ->where('users.id', '!=', Auth::user()->id)
            ->where('lessons.complete_status', '!=', 3)
            ->where('lessons.complete_status', '!=', 4)
            ->where('lessons.complete_status', '!=', 5)
            ->select('users.name', 'users.email', 'lessons.datetime', 'lessons.id as lid', 'lessons.complete_status')
            ->orderBy('lessons.created_at', 'desc')
            ->paginate(10);

        return view('admin.lesson-view', ['title' => 'View Lessons', 'lessons' => $lessons]);
    }

    public function question_view($id)
    {
        $questions = DB::table('questions')
            ->join('users', 'questions.user_id', '=', 'users.id')
            ->where('questions.lesson_id', '=', $id)
            ->paginate(20);

        $lesson = Lesson::whereId($id)->select('datetime', 'user_id', 'id')->first();

        $user = User::whereId($lesson->user_id)->select('name')->first();

        return view('admin.questions', ['title' => 'Questions','questions' => $questions, 'lesson' => $lesson, 'user' => $user]);
    }

    public function results($id)
    {
        $results = DB::table('questions')
            ->join('results', 'questions.id', '=', 'results.question_id')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->where('results.lesson_id', '=', $id)
            ->get();

        $lesson = Lesson::whereId($id)->select('datetime', 'user_id', 'id')->first();
        $user = User::whereId($lesson->user_id)->select('name')->first();

        $testtimes = TestTime::whereLessonId($id)->first();

        // start algo

        $resume_pause = ResumePause::whereLessonId($id)->get();

        if(count($resume_pause) > 0) {
            foreach($resume_pause as $rp) {
                $date1 = new DateTime($rp->resume);
                $date2 = new DateTime($rp->pause);
                $diff = $date1->diff($date2);
                $diff_f[] = $diff->i;
                $diff_f_sec[] = $diff->s;
                $diff_f_h[] = $diff->h;
                $diff_f_m[] = $diff->m;
                $diff_f_y[] = $diff->y;
                $diff_f_day[] = $diff->d;
            }

            $datetime1 = new DateTime($testtimes->start_time);
            $datetime2 = new DateTime($testtimes->end_time);
            $interval = $datetime1->diff($datetime2);

            $minute = $interval->i - array_sum($diff_f);
            $seconds = $interval->s - array_sum($diff_f_sec);
            $hour = $interval->h - array_sum($diff_f_h);
            $day = $interval->d - array_sum($diff_f_day);
            $month = $interval->m - array_sum($diff_f_m);
            $year = $interval->y - array_sum($diff_f_y);


            return view('admin.results', ['title' => 'Result', 'results' => $results, 'lesson'=>$lesson, 'user'=>$user, 'testtimes' => $testtimes, 'minute' => $minute, 'seconds' => $seconds, 'hour' => $hour, 'month' => $month, 'year' => $year, 'day' => $day]);
        } else {
            $datetime1 = new DateTime($testtimes->start_time);
            $datetime2 = new DateTime($testtimes->end_time);
            $interval = $datetime1->diff($datetime2);

            $minute = $interval->i;
            $seconds = $interval->s;
            $hour = $interval->h;
            $day = $interval->d;
            $month = $interval->m;
            $year = $interval->y;


            return view('admin.results', ['title' => 'Result', 'results' => $results, 'lesson'=>$lesson, 'user'=>$user, 'testtimes' => $testtimes, 'minute' => $minute, 'seconds' => $seconds, 'hour' => $hour, 'month' => $month, 'year' => $year, 'day' => $day]);
        }
    }

    public function add_question($lid)
    {
        return view('admin.add-question', ['title' => 'Add Question', 'lid' => $lid]);
    }

    public function add_question_post(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'question' => 'required',
            'main' => 'required',
            'lesson_id' => 'required',
            'correct' => 'required'
        ]);

        try {
            $user_id = Lesson::whereId($request->lesson_id)->select('user_id')->first();
            $question = new Question;

            $question->lesson_id = $request->lesson_id;
            $question->user_id = $user_id->user_id;
            $question->status = 0;
            $question->q_one = $request->one;
            $question->q_two = $request->two;
            $question->q_three = $request->three;
            $question->q_four = $request->four;
            $question->question_main = $request->main;
            $question->question_name = $request->question;
            $question->subject_name = $request->subject;

            $question->save();

            // add the correct answer

            $c_ans = new Answer;

            $c_ans->question_id = $question->id;
            $c_ans->correct_ans = $request->correct;

            $c_ans->save();

            return back()->with('msg', 'Question added successfully.');
        } catch (\Throwable $th) {
            return back()->with('err', 'Error! ' . $th->getMessage());
        }
    }

    public function add_comparison()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $comparison_cates = ComparisonCategory::all();

        return view('admin.add-comparison', ['title' => 'Add comparison', 'users' => $users, 'comparison_cates' => $comparison_cates]);
    }

    public function ajax_comparison(Request $request)
    {
        $comparisons = Comparison::whereCompCategoryId($request->str)->get();

        $returnHTML = view('admin.comparison-ajax', ['comparisons_ajax' => $comparisons])->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML, 'correct'=>true));
    }

    public function comparison_post(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'category' => 'required',
            'comparison' => 'required',
            'title' => 'required',
            'm_one' => 'required',
            'm_two' => 'required'
        ]);

        $stats = new Stat;

        $stats->comparison_id = $request->comparison;
        $stats->title = $request->title;
        $stats->metric_one = $request->m_one;
        $stats->metric_two = $request->m_two;
        $stats->user_id = $request->user;
        $stats->progress = $request->progress;

        $stats->save();

        return back()->with('msg', 'Comparison Stats has been added.');

    }

    public function view_comparison()
    {
        $comparisons = DB::table('comp_category')
            ->join('comparisons', 'comp_category.id', '=', 'comparisons.comp_category_id')
            ->paginate(10);

        return view('admin.view-comparisons', ['title' => 'View Comparisons', 'comparisons' => $comparisons]);
    }

    public function view_stats($id)
    {
        $stats = DB::table('stats', 's')
            ->join('comparisons as c', 's.comparison_id', '=', 'c.id')
            ->join('comp_category as cc', 'c.comp_category_id', '=', 'cc.id')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->where('s.comparison_id', '=', $id)
            ->select('s.title as stat_title', 's.metric_one', 's.metric_two', 'c.name', 'cc.title as comp_cate_title', 's.id as stat_id', 's.progress', 'u.name as u_name', 'u.email as u_email')
            ->paginate(10);

        return view('admin.view-stats', ['title' => 'View Stats', 'stats' => $stats]);
    }

    public function add_test()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.add-test', ['title' => 'Add Test', 'users' => $users]);
    }

    public function add_test_post(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'user' => 'required',
            'status' => 'required'
        ]);

        $lesson = new Lesson;

        $lesson->name = 'test';
        $lesson->user_id = $request->user;
        $lesson->datetime = date('Y-m-d H:i:s', strtotime($request->date));
        $lesson->token = md5(uniqid() . time() );
        $lesson->complete_status = $request->status;

        $lesson->save();

        return back()->with('msg', 'Test added.');
    }

    public function test_view()
    {
        $lessons = DB::table('lessons')
            ->join('users', 'lessons.user_id', '=', 'users.id')
            ->where('users.id', '!=', Auth::user()->id)
            ->where('lessons.complete_status', '!=', 0)
            ->where('lessons.complete_status', '!=', 1)
            ->select('users.name', 'users.email', 'lessons.datetime', 'lessons.id as lid', 'lessons.complete_status')
            ->orderBy('lessons.created_at', 'desc')
            ->paginate(10);

        return view('admin.view-test', ['title' => 'View Tests', 'lessons' => $lessons]);
    }

    public function add_progress_title($stat_id)
    {
        return view('admin.add-progress-title', ['title' => 'Add Progress Title', 'stat_id' => $stat_id]);
    }

    public function add_progress_title_post(Request $request)
    {
        $request->validate([
            'cate' => 'required',
            'title' => 'required',
            'stat_id' => 'required'
        ]);

        $save = new StatProgressTitle;

        $save->title = $request->title;
        $save->timeprogress_name = $request->cate;
        $save->stat_id = $request->stat_id;

        $save->save();

        return back()->with('msg', 'Progress title saved.');
    }

    public function view_progress_title($stat_id)
    {
        $progress_titles = StatProgressTitle::whereStatId($stat_id)->paginate(10);

        return view('admin.view-progress-title', ['title' => 'View Progress Title', 'stat_id' => $stat_id, 'progress_titles' => $progress_titles]);
    }

    public function add_progress_metrics($title_id, $stat_id)
    {
        $titles = StatProgressTitle::whereStatId($stat_id)->get();

        return view('admin.add-progress-metrics', ['title' => 'Add Progress Metrics', 'stat_id' => $stat_id, 'titles' => $titles]);
    }

    public function add_progress_metrics_post(Request $request)
    {
        $request->validate([
            'title_id' => 'required',
            'm_one' => 'required',
            'm_two' => 'required',
            'stat_id' => 'required'
        ]);

        $stat_id = Stat::whereId($request->stat_id)->select('user_id')->first();

        $save = new StatProgress;

        $save->stat_progress_title_id = $request->title_id;
        $save->metric_one = $request->m_one;
        $save->metric_two = $request->m_two;
        $save->user_id = $stat_id->user_id;

        $save->save();

        return back()->with('msg', 'Progress Metrics saved.');
    }

    public function view_progress_metrics($title_id, $stat_id)
    {
        $metrics = StatProgress::whereStatProgressTitleId($title_id)->paginate(10);

        return view('admin.view-progress-metrics', ['title' => 'View Progress Metrics', 'metrics' => $metrics]);
    }
}
