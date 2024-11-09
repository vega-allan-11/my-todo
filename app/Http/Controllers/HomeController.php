<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Show the home page
    public function show()
    {
        // get the 3 latest completed and incomplete tasks
        $completedTasks = Task::where('user_id', Auth::id())
                              ->where('is_completed', true)
                              ->limit(3)
                              ->get()
                              ->map(function ($task) {
                                  $task->title = Str::limit($task->title, 100);
                                  return $task;
                              });

        $incompleteTasks = Task::where('user_id', Auth::id())
                               ->where('is_completed', false)
                               ->limit(3)
                               ->get()
                               ->map(function ($task) {
                                   $task->title = Str::limit($task->title, 100);
                                   return $task;
                               });

        // pass the tasks to the view
        return view('dashboard.home', compact('completedTasks', 'incompleteTasks'));
    }
}
