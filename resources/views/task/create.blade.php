@extends('layouts.app')

@section('header')
{{ __('Creating new task') }}
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
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                <small id="nameHelpBlock" class="form-text text-muted">
                                    {{ __('Required field') }}
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="executor_id" class="col-md-4 col-form-label text-md-right">{{ __('Executor') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="executor_id" name="executor_id">
                                <option value="">{{ __('assign later') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id}} ">{{ $user->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Task status') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="status_id" name="status_id" value="{{ old('status_id')}}">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id}} ">{{ $status->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Create new task') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection