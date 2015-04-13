@extends('layouts.basic')

@section('header')
<div class="col-sm-12 col-md-10 col-md-offset-1">{{ link_to('/', 'Login', array('class'=>'register-link')) }}</div>
@stop

@section('content')
    <div class="bottom-offset col-md-6 col-md-offset-3 col-sm-12">
        @if (Session::has('message'))
            <h3 class="tcenter">{{ Session::get('message') }}</h3>
            <div class="tcenter">{{ link_to('/', 'Back to login') }}</div>
        @else
            <h3 class="tcenter bottom-offset">Registration</h3>
            {{ Session::get('message') }}
            {{ Form::open(['route' => 'register']) }}
                <div class="bottom-offset">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
                    <span class="error-msg">{{ $errors->first('email') }}<span>
                </div>
                <div class="bottom-offset">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', array('class'=>'form-control')) }}
                    <span class="error-msg">{{ $errors->first('password') }}<span>
                </div>
                <div class="bottom-offset">
                    {{ Form::label('repassword', 'Retype password') }}
                    {{ Form::password('repassword', array('class'=>'form-control')) }}
                    <span class="error-msg">{{ $errors->first('repassword') }}<span>
                </div>
                {{ Form::submit('Register', array('class'=>'remove-input-style btn-block btn-primary')) }}
            {{ Form::close() }}
        @endif
    </div>
@stop