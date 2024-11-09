<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function show(Request $request)
    {
        $year = $request->input('year', now()->year); // current year by default

        // get the task by month for the user authenticated
        $completedTasks = Task::where('user_id', Auth::id()) 
            ->whereYear('due_date', $year)
            ->where('is_completed', true)
            ->selectRaw('MONTH(due_date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

        // each month has a value even the "0"
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $completedTasks->get($i, 0);
        }

        return view('dashboard.statistics', [
            'monthlyData' => $monthlyData,
            'year' => $year,
        ]);
    }
}
