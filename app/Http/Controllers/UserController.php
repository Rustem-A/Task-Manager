<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $assignedTasks = Task::where('executor_id', $user->id)->get();
        $isUser = $request->user() == $user;
        return view('user.show', compact('user', 'isUser', 'assignedTasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $dateArr = explode('-', $user->birthday);
        return view('user.edit', compact('user', 'dateArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $day = $request->input('birth_day');
        $month = $request->input('birth_month');
        $year = $request->input('birth_year');

        if ($day && $month && $year) {
            $birthday = "$day.$month.$year";
        } else {
            $birthday = null;
        }

        $user->fill(['name' => $request->input('name'), 'lastname' => $request->input('lastname')]);
        $user->birthday = $birthday;
        $user->save();
        $request->session()->flash('success', 'Your profile has been changed!');

        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
