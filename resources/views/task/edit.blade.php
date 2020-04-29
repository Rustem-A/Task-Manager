@extends('layouts.app')

@section('header')
{{ __('Change task') }}
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                    <h5>
                        {{ __('Please fill in the following form') }}</div>
                    </h5>
                <div class="card-body">
                {{ Form::open(['method' => 'PATCH', 'url' => route('tasks.update', $task)]) }}
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $task->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" rows="3">{{ old('description') ?? $task->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="executor_id" class="col-md-4 col-form-label text-md-right">{{ __('Executor') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="executor_id" name="executor_id">
                                @if($task->executor_id)
                                    <option value="{{ App\User::find($task->executor_id)->id }}">{{ App\User::find($task->executor_id)->name }}</option>
                                @else
                                    <option value="{{ old('assignedTo_id') ?? '' }}">{{ __('assign later') }}</option>
                                @endif
                                    <option value="{{ '' }}">{{ __('assign later') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id}} ">{{ $user->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Task status') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="status_id" name="status_id" value="{{ old('status_id') ?? $task->status_id }}">
                                <option value="{{ old('status_id') ?? $task->status->id }}">{{ $task->status->name }}</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id}} ">{{ $status->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag_id" class="col-md-4 col-form-label text-md-right">{{ __('Task status') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="tag_id" name="tag_id" value="{{ old('tag_id') ?? $task->tag_id}}">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id}} ">{{ $tag->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Save changes') }}
                                </button>
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection