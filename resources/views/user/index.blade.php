@extends('layouts.app')

@section('header')
Users List
@endsection

@section('content')
    <table class="table table-hover table-bordered">
        <tr class="bg-secondary text-center text-white">
            <th>№</th>
            <th>{{ __('Nickname') }}</th>
            <th>{{ __('First name') }}</th>
            <th>{{ __('Last name') }}</th>
            <th>{{ __('Registration date') }}</th>
            <th>{{ __('Tasks') }}</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</a></td>
            <td><a href="{{ route('users.show', $user) }}">{{$user->nickname}}</a></td>
            <td>{{ $user->name ?? '--'}}</td>
            <td>{{ $user->lastname ?? '--' }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->tasks->count() ?? '--' }}</td>
        <tr>
        @endforeach
    </table>
    {{ $users->links() }}
    
@endsection