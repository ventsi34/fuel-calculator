@extends('layouts.basic')

@section('header')
<div class="col-md-5">{{ link_to('/register', 'Register') }}</div>
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h3>Login</h3>
        @if (Session::has('error'))
            {{ Session::get('error') }}
        @endif
        {{ Form::open(['route' => 'login']) }}
            <div>
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email') }}
            </div>
            <div>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>
            {{ Form::submit('Login') }}
        {{ Form::close() }}
    </div>
@stop