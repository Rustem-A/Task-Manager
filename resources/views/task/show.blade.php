@extends('layouts.app')

@section('header')
    task
@endsection

@section('content')
@guest
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card border-danger">
                <div class="card-body">
                    <p>
                    To continue, please <a href="/register">register</a> or <a href="/login">log in</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endguest
@auth
<div class="card-group col-sm">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                    <h5>
                        {{ __('Task information') }}
                    </h5>
                </div>
                <div class="card-body">
                <div class="row">
                            <div class="col">
                                <p>Creator</p>
                            </div>
                            <div class="col">
                                <p><a href="{{ route('users.show', $task->creator) }}">{{$task->creator->name}}</a></p>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <p>{{ __('Title') }}</p>
                        </div>
                        <div class="col">
                            <p>{{ $task->title }}</p>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col">
                                <p>Description</p>
                            </div>
                            <div class="col">
                                <p>{{ $task->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Executor</p>
                            </div>
                            <div class="col">
                            @if($executor)
                                <p><a href="{{ route('users.show', $executor) }}">{{$executor->name}}</a></p>
                            @else
                                <p>Executor not assigned</p>
                            @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Status</p>
                            </div>
                            <div class="col">
                                <p>{{ $task->status->name }}</p>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col">
                            <p>{{ __('Registration date') }}</p>
                        </div>
                        <div class="col">
                            <p>{{ $task->created_at }}</p>
                        </div>
                    </div>
                    @if(Auth::user() == $task->creator || Auth::user()->id == $task->executor_id)
                        <div class="btn btn-secondary">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-white">
                                {{ __('Chenge task') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card border-light">
                <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                    <h5>
                        {{ __('Comments') }}
                    </h5>
                </div>
                <div class="card-body">
                
                @foreach ($comments as $comment)
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            {{ __('Date') }}: {{ $comment->created_at }}
                        </div>
                        <div>
                            {{ __('Author') }}
                            <a href="{{ route('users.show', $comment->creator) }}">{{$comment->creator->name}}</a>
                        </div>
                        <div>
                            {{ $comment->text }}
                        </div>
                    </div>
                </div>
                @endforeach

                @auth
        <div class="card border-light">
            <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                <h5>
                    {{ __('Add new comment') }}
                </h5>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('tasks.taskComments.store', $task), 'method' => 'POST']) }}
                @csrf
                    <div class="form-group row">
                            <textarea id="text" class="form-control" name="text" rows="3">{{ old('text') }}</textarea>
                    </div>
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-secondary col-sm-3">
                            {{ __('Save') }}
                        </button>
                    </div>
                {{ Form::close()}}
            </div>
        </div>
        @endauth

                </div>
            </div>
@endauth
@endsection