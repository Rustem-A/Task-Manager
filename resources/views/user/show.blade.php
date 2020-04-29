@extends('layouts.app')

@section('header')
    user
@endsection

@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

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
                        {{ __('Registration information') }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>{{ __('NickName') }}</p>
                        </div>
                        <div class="col">
                            <p>{{ $user->nickname }}</p>
                        </div>
                    </div>
                    @if($isUser)
                        <div class="row">
                            <div class="col">
                                <p>E-mail</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                            <div class="col">
                                <p>Name</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Lastname</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->lastname }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Birthday</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->birthday }}</p>
                            </div>
                        </div>
                        
                    <div class="row">
                        <div class="col">
                            <p>{{ __('Registration date') }}</p>
                        </div>
                        <div class="col">
                            <p>{{ $user->created_at }}</p>
                        </div>
                    </div>

                    @if($isUser)
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <a href="{{ route('users.edit', $user) }}"><button type="button" class="btn btn-primary">
                                    {{ __('Add/Change fields') }}
                                </button></a>
                            </div>
                     </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card border-light">
                <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                    <h5>
                        {{ __('Created tasks') }}
                    </h5>
                </div>
                <div class="card-body p-1">
                
                @if(sizeof($user->tasks))
                    @foreach($user->tasks as $task)
                        @include('user.infoOfTaskInUserProfile')
                    @endforeach
                @else
                    <p class="m-2">{{ __('No tasks') }}</p>
                @endif
                </div>
            </div>

            <div class="card border-light">
                <div class="card-header bg-secondary text-white text-center pt-3 pb-1">
                    <h5>
                        {{ __('Assigned tasks') }}
                    </h5>
                </div>
                <div class="card-body p-1">
                
                @if(sizeof($assignedTasks))
                    @foreach($assignedTasks as $task)
                        @include('user.infoOfTaskInUserProfile')
                    @endforeach
                @else
                    <p class="m-2">{{ __('No tasks') }}</p>
                @endif
                </div>
            </div>
        </div>
@endauth
@endsection