@extends('layouts.skeleton')

@section('content')
    {{ Form::open(['url' => 'settings/'.Auth::id(), 'method' => 'put']) }}
        <h4>Profile settings</h4>
        <p>{{ Auth::user()->email }}</p>
        <div>
            {{ Form::label('password', 'Old password:') }}
            {{ Form::password('old_password') }}
            {{ $errors->first('old_password') }}
        </div>
        <div>
            {{ Form::label('password', 'New password:') }}
            {{ Form::password('password') }}
            {{ $errors->first('password') }}
        </div>
        <div>
            {{ Form::label('repassword', 'Retype new password:') }}
            {{ Form::password('repassword') }}
            {{ $errors->first('repassword') }}
        </div>
        {{ Form::submit('Update') }}
    {{ Form::close() }}
@stop