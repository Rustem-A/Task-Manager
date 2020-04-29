@extends('layouts.app')

@section('header')
Tasks List
@endsection

@section('content')

<div class='col'>
<div class="card mb-2">
<div class="card-body">

{{ Form::open(['url' => route('tasks.index'),'method' => 'get']) }}
    {{ Form::hidden('authUserId', Auth::user()->id) }}
    <div class="form-group col-md-3 pl-3 my-2">
            <button type="submit" class="btn text-white btn-primary btn-block">
                {{ __('My tasks') }}
            </button>
    </div>
{{ Form::close() }}


{{ Form::open(['url' => route('tasks.index'),'method' => 'get']) }}

    <div class="form-row">
        <div class="form-group col-md-3 pl-4 pr-2 my-2">
            <label for="creator_id"><b>{{ __('Creator') }}</b></label>
            <select class="form-control" id="creator_id" name="creator_id">
                <option value="">{{ __('not selected') }}</option>
                @foreach($users as $user)
                    @if (isset($_GET['creator_id']) && $_GET['creator_id'] == $user->id)
                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-3 pl-4 pr-2 my-2">
            <label for="creator_id"><b>{{ __('Executor') }}</b></label>
            <select class="form-control" id="executor_id" name="executor_id">
                <option value="">{{ __('not selected') }}</option>
                @foreach($users as $user)
                    @if (isset($_GET['executor_id']) && $_GET['executor_id'] == $user->id)
                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    
        <div class="form-group col-md-3 pl-4 pr-2 my-2">
            <label for="status_id"><b>{{ __('Status') }}</b></label>
            <select class="form-control" id="status_id" name="status_id">
                <option value="">{{ __('not selected') }}</option>
                @foreach($statuses as $status)
                    @if (isset($_GET['status_id']) && $_GET['status_id'] == $status->id)
                        <option selected value="{{ $status->id }}">{{ $status->name }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        </div>

    <div class="form-row mr-3">
        <div class="form-group col-md-3 pl-4 my-2">
            <button type="submit" class="btn btn-primary text-white btn-block">
                {{ __('Apply filter')}}
            </button>
        </div>

        <div class="btn btn-primary text-white m-2 col-md-3 pb-1">
            <a href="{{ route('tasks.index') }}" class="text-white">{{ __('Remove all filters')}}</a>
        </div>
    </div>

{{ Form::close() }}
</div>
</div>
</div>

@if(Auth::check())
<div class="form-group col-md-3 pl-4 my-2">
    <div class="btn btn-secondary ml-3 mt-3">
        <a href="{{ route('tasks.create') }}" class="text-white">{{ __('Create new task') }}</a>
    </div>
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

 
@endsection