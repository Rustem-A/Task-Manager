<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskComment;
use Illuminate\Http\Request;

class TaskCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @param  \App\TaskComment  $taskComment
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task, TaskComment $taskComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @param  \App\TaskComment  $taskComment
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, TaskComment $taskComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @param  \App\TaskComment  $taskComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task, TaskComment $taskComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @param  \App\TaskComment  $taskComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, TaskComment $taskComment)
    {
        //
    }
}
