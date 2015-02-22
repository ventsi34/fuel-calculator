@extends('layouts.basic')

@section('header')
<div class="col-md-5">{{ link_to('/', 'Login') }}</div>
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        @if (Session::has('message'))
            <h3>{{ Session::get('message') }}</h3>
            <span>{{ link_to('/', 'Back to login') }}</span>
        @else
            <h3>Registration</h3>
            {{ Session::get('message') }}
            {{ Form::open(['route' => 'register']) }}
                <div>
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', Input::old('email')) }}
                    {{ $errors->first('email') }}
                </div>
                <div>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                    {{ $errors->first('password') }}
                </div>
                <div>
                    {{ Form::label('repassword', 'Retype password') }}
                    {{ Form::password('repassword') }}
                    {{ $errors->first('repassword') }}
                </div>
                {{ Form::submit('Register') }}
            {{ Form::close() }}
        @endif
    </div>
@stop