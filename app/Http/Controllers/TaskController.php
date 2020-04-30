<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\TaskStatus;
use App\TaskTag;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $statuses = TaskStatus::all();
        $tags = TaskTag::all();
        $tasks = Task::paginate();

        $query = Task::query();
        
        if ($request->has('authUserId')) {
            $tasks = User::find($request->input('authUserId'))->tasks;
        }

        if ($request->input('creator_id') || $request->input('executor_id') || $request->input('status_id')) {
            foreach ($request->all() as $name => $value) {
                if ($value !== null) {
                    $query->where($name, $value);
                }
            }
            $tasks = $query->get();
        }
        
        return view('task.index', compact('tasks', 'users', 'statuses', 'tags'));
    }

    public function create()
    {
        $statuses = TaskStatus::orderBy('id', 'desc')->paginate();
        $tags = TaskTag::all();
        
        $users = User::all();
        return view('task.create', compact('users', 'statuses', 'tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();

        $this->validate($request, [
            'title' => 'required|max:40'
        ]);

        $task->fill($request->all());
        $task->creator_id = $request->user()->id;
        $task->save();

        $request->session()->flash('success', 'Task has been created!');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $comments = $task->comments;
        $executor = User::find($task->executor_id);
        return view('task.show', compact('task', 'executor', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $statuses = TaskStatus::all();
        $tags = TaskTag::all();
        return view('task.edit', compact('task', 'users', 'statuses', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'max:40'
        ]);

        $task->fill($request->all());
        $task->save();

        $request->session()->flash('success', 'Task has been updeted!');

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $task->creator()->dissociate();
        $task->status()->dissociate();
        $task->comments()->delete();

        $task->delete();

        $request->session()->flash('success', 'Task has been deleted!');

        return redirect()->route('tasks.index');
    }
}
