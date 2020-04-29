@extends('layouts.app')

@section('header')
Tasks List
@endsection

@section('content')
@if(Auth::check())
<div class="btn btn-secondary ml-3 mt-3">
    <a href="{{ route('tasks.create') }}" class="text-white">{{ __('Create new task') }}</a>
</div>
@endif

    <table class="table table-hover table-bordered">
        <tr class="bg-secondary text-center text-white">
            <th>№</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Creator') }}</th>
            <th>{{ __('Executor') }}</th>
            <th>{{ __('Registration date') }}</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td><a href="{{ route('tasks.show', $task) }}">{{$task->title}}</a></td>
            <td>{{$task->status->name ?? '--'}}</td>
            <td>{{ $task->description ?? '--' }}</td>
            <td>
                @if($task->creator->name)
                    <a href="{{ route('users.show', $task->creator) }}">{{$task->creator->name}}</a>
                @else
                    {{'--'}}
                @endif
            </td>
            <td>
            @if($task->executor_id)
            <a href="{{ route('users.show', App\User::find($task->executor_id)) }}">{{ App\User::find($task->executor_id)->name }}</a>
            @else
            {{ __('not assigned') }}
            @endif
            </td>
            <td>{{ $task->created_at }}</td>
        <tr>
        @endforeach
    </table>

    <div class="ml-3 mt-4">
    {{ $tasks->links() }}
    </div>
@endsection