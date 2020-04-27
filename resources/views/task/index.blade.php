@extends('layouts.app')

@section('header')
Tasks List
@endsection

@section('content')
    <table class="table table-hover table-bordered">
        <tr class="bg-secondary text-center text-white">
            <th>№</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Desc') }}</th>
            <th>{{ __('Creator') }}</th>
            <th>{{ __('Registration date') }}</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</a></td>
            <td><a href="{{ route('task.show', $task) }}">{{$task->name}}</a></td>
            <td>{{ $task->desc ?? '--' }}</td>
            <td>{{ $task->creator_id ?? '--'}}</td>
            <td>{{ $task->created_at }}</td>
        <tr>
        @endforeach
    </table>
    {{ $tasks->links() }}
    
@endsection