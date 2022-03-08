<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\ComparisonCategory;
use App\Models\Stat;
use App\Models\StatProgressTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComparisonController extends Controller
{
    public function index($id=null)
    {
        $category = ComparisonCategory::all();
        return view('comparisons.index', ['title' => 'Comparisons & Progress', 'categories' => $category, 'idd' => $id]);
    }

    public function stats($id, $idd=null)
    {
        if($idd != null) {
            $stats = Stat::whereComparisonId($id)->where('user_id', '=', $id)->get();
        } else {
            $stats = Stat::whereComparisonId($id)->where('user_id', '=', Auth::user()->id)->get();
        }

        return view('comparisons.stats', ['title' => 'Stats', 'stats' => $stats]);
    }

    public function time_progress($id, $stat_id)
    {
        $stat = Stat::whereId($stat_id)->where('user_id', '=', Auth::user()->id)->first();

        $comparison = Comparison::whereId($id)->first();

        return view('comparisons.time-progress', ['title' => 'Time Progress', 'stat' => $stat, 'comparison' => $comparison]);
    }

    public function time_progress_metrics($id, $time)
    {
        $stat_progress_title = StatProgressTitle::whereStatId($id)->where('timeprogress_name', '=', $time)->get();

        $stat = Stat::whereId($id)->select('comparison_id')->first();
        $comparison = Comparison::whereId($stat->comparison_id)->first();

        return view('comparisons.time-progress-metrics', ['title' => 'Time Progress Metrics', 'stat_progress_title' => $stat_progress_title, 'time' => $time, 'comparison' => $comparison]);
    }
}
