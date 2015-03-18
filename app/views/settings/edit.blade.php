@extends('layouts.skeleton')

@section('content')
<div class="bottom-offset col-md-4 col-md-offset-4 col-sm-12">
    @if (Session::has('message'))
        <p class="bg-success">{{ Session::get('message') }}</p>
    @endif
    {{ Form::open(['url' => 'settings/'.Auth::id(), 'method' => 'put']) }}
        <h4 class="tcenter bottom-offset">Profile settings</h4>
        <p class="tcenter bottom-offset">{{ Auth::user()->email }}</p>
        <div class="bottom-offset">
            {{ Form::label('password', 'Old password:') }}
            {{ Form::password('old_password', array('class'=>'form-control')) }}
            <span class="error-msg">{{ $errors->first('old_password') }}</span>
        </div>
        <div class="bottom-offset">
            {{ Form::label('password', 'New password:') }}
            {{ Form::password('password', array('class'=>'form-control')) }}
            <span class="error-msg">{{ $errors->first('password') }}</span>
        </div>
        <div class="bottom-offset">
            {{ Form::label('repassword', 'Retype new password:') }}
            {{ Form::password('repassword', array('class'=>'form-control')) }}
            <span class="error-msg">{{ $errors->first('repassword') }}</span>
        </div>
        {{ Form::submit('Update', array('class'=>'remove-input-style btn-block btn-primary')) }}
    {{ Form::close() }}
</div>
@stop