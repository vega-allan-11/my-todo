<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; // Agrega esta línea

class TaskController extends Controller
{

public function show(Request $request)
{
    $status = $request->input('filter');
    $order = $request->input('order');
    $search = $request->input('search');

    // filter tasks by user id 
    $tasks = Task::where('user_id', Auth::id());

    // filter by status
    if ($status !== null) {
        $tasks->where('is_completed', $status);
    }

    // filter by search
    if ($search) {
        $tasks->where('title', 'like', '%' . $search . '%');
    }

    // Order by
    if ($order) {
        switch ($order) {
            case 'asc_title':
                $tasks->orderBy('title', 'asc');
                break;
            case 'des_title':
                $tasks->orderBy('title', 'desc');
                break;
            case 'asc_due_date':
                $tasks->orderBy('due_date', 'asc');
                break;
            case 'des_due_date':
                $tasks->orderBy('due_date', 'desc');
                break;
        }
    }

    // Paginate with 8 tasks
    $tasks = $tasks->paginate(8);

    return view('dashboard.tasks', compact('tasks'));
}
    
    

    public function showSpecific($id)
    {
        // search the task by its id
        $task = Task::findOrFail($id);
    
        // return a specific task in other view
        return view('dashboard.specificTask', compact('task'));
    }
    
    
    

    public function store(Request $request): RedirectResponse
    {
        // validate the data
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'is_completed' => 'nullable|boolean',
        ]);

        // Create a task for the user authenticated
        Auth::user()->tasks()->create($validatedData);

        return redirect()->route('tasks')->with('success', 'Task created successfully.');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'is_completed' => 'nullable|boolean',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks')->with('success', 'Task updated successfully.');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();
    
        // fetch the filter, order, search and page parameters
        $filter = $request->input('filter');
        $order = $request->input('order');
        $search = $request->input('search');
        $page = $request->input('page'); // catch the current page
    
        //  redirect with the same parameters
        return redirect()->route('tasks', [
            'filter' => $filter,
            'order' => $order,
            'search' => $search,
            'page' => $page, // add the page number to the redirect
        ])->with('success', 'Task deleted successfully.');
    }


}
