<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $viewData = [];
        $followData = [];
        $stories = Story::all();
        $start_date = date('Y-m-d', strtotime('-1 month'));
        $end_date = date('Y-m-d');
        $chapterViewLogs = DB::table('chapter_view_logs')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_view')->groupBy('chapter_id')->get()->toArray();
        foreach ($stories as $story) {
            $view = 0;
            $chapters = Chapter::where('story_id', $story->id)->get()->toArray();
            foreach ($chapterViewLogs as $chapterViewLog) {
                if (in_array($chapterViewLog->chapter_id, array_column($chapters, 'id'))) {
                    $view += $chapterViewLog->count_view;
                }
            }
            $viewData[] = [
                'story' => $story->name,
                'view' => $view
            ];        
        }

        $follows = DB::table('follows')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_follow')->groupBy('author_id')->get()->toArray();

        foreach ($follows as $follow) {
            $followData[] = [
                'author' => User::find($follow->author_id)->name,
                'follow' => $follow->count_follow
            ];
        }

        $traffics = DB::table('traffics')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_traffic, DATE(created_at) as date')->groupBy('date')->get()->toArray();

        usort($viewData, fn($a, $b) => $a['view'] <= $b['view']);
        usort($followData, fn($a, $b) => $a['follow'] <= $b['follow']);

        return view('admin.dashboard.index', compact('viewData', 'followData', 'start_date', 'end_date', 'traffics'));
    }

    public function filterDashboard(Request $request)
    {
        $viewData = [];
        $followData = [];
        $stories = Story::all();
        if ($request->has('start_date')) {
            $start_date = $request->start_date;
        } else {
            $start_date = date('Y-m-d', strtotime('-1 month'));
        }
        if ($request->has('end_date')) {
            $end_date = $request->end_date;
        } else {
            $end_date = date('Y-m-d');
        }
        $chapterViewLogs = DB::table('chapter_view_logs')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_view')->groupBy('chapter_id')->get()->toArray();
        foreach ($stories as $story) {
            $view = 0;
            $chapters = Chapter::where('story_id', $story->id)->get()->toArray();
            foreach ($chapterViewLogs as $chapterViewLog) {
                if (in_array($chapterViewLog->chapter_id, array_column($chapters, 'id'))) {
                    $view += $chapterViewLog->count_view;
                }
            }
            $viewData[] = [
                'story' => $story->name,
                'view' => $view
            ];        
        }

        $follows = DB::table('follows')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_follow')->groupBy('author_id')->get()->toArray();

        foreach ($follows as $follow) {
            $followData[] = [
                'author' => User::find($follow->author_id)->name,
                'follow' => $follow->count_follow
            ];
        }

        $traffics = DB::table('traffics')
        ->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])
        ->selectRaw('*, count(*) count_traffic, DATE(created_at) as date')->groupBy('date')->get()->toArray();

        usort($viewData, fn($a, $b) => $a['view'] <= $b['view']);
        usort($followData, fn($a, $b) => $a['follow'] <= $b['follow']);

        return view('admin.dashboard.index', compact('viewData', 'followData', 'start_date', 'end_date', 'traffics'));
    }
}
