@extends('layouts.app')

@section('header')
Registration
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="text-center bg-secondary text-white text-uppercase pb-2 pt-3 mb-2">
                <h6 class="font-weight-bold">
                  Please fill out the form
                </h6>
            </div>

                <div class="card-body">
                {{ Form::open(['url' => route('users.update', $user), 'method' => 'PATCH']) }}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-2">
                                <input id="birth_day" type="text" class="form-control" name="birth_day" value="{{ $dateArr[2][0] }}{{ $dateArr[2][1] }}" placeholder="{{ __('Day') }}">
                            </div>
                            <div class="col-md-2">
                                <input id="birth_month" type="text" class="form-control" name="birth_month" value="{{ $dateArr[1] }}" placeholder="{{ __('Month') }}">
                            </div>
                            <div class="col-md-2">
                                <input id="birth_year" type="text" class="form-control" name="birth_year" value="{{ $dateArr[0] }}" placeholder="{{ __('Year') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
