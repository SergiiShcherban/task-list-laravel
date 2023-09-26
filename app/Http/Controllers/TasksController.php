<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * @return \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tasks = Task::latest()->paginate(5);

        return view('index', ['tasks' => $tasks]);
    }

    /**
     * @param TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request): \Illuminate\Http\RedirectResponse
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created');
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back()->with('success', 'Task updated');
    }
}
