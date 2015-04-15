@extends('layouts.basic')

@section('header')
<div class="col-sm-12 col-md-10 col-md-offset-1">{{ link_to('/register', 'Register', array('class'=>'register-link')) }}</div>
@stop

@section('content')
    @if (Session::has('error'))
        <p class="bg-danger">{{ Session::get('error') }}</p>
    @endif
    <div class="bottom-offset col-md-4 col-md-offset-4 col-sm-12">
        
        <h3 class="tcenter bottom-offset">Login</h3>
        {{ Form::open(['route' => 'login']) }}
            <div class="bottom-offset">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', '', array('class'=>'form-control')) }}
            </div>
            <div class="bottom-offset">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class'=>'form-control')) }}
            </div>
            {{ Form::submit('Login', array('class'=>'remove-input-style btn-block btn-primary')) }}
        {{ Form::close() }}
    </div>
@stop