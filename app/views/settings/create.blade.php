@extends('layouts.skeleton')

@section('content')
    {{ Form::open(['route' => 'settings.store']) }}
        <h4>Profile settings</h4>
        <p>{{ Auth::user()->email }}</p>
        <div>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
            {{ $errors->first('password') }}
        </div>
        <div>
            {{ Form::label('repassword', 'Retype password:') }}
            {{ Form::password('repassword') }}
            {{ $errors->first('repassword') }}
        </div>
        {{ Form::submit('Update') }}
    {{ Form::close() }}
@stop