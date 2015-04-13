@extends('layouts.skeleton')

@section('content')
<div class="bottom-offset col-md-4 col-md-offset-4 col-sm-12">
    {{ Form::open(['route' => 'settings.store']) }}
        <h4 class="tcenter bottom-offset">Profile settings</h4>
        <p class="tcenter bottom-offset">{{ Auth::user()->email }}</p>
        <div class="bottom-offset">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', array('class'=>'form-control')) }}
            <span class="error-msg">{{ $errors->first('password') }}</span>
        </div>
        <div class="bottom-offset">
            {{ Form::label('repassword', 'Retype password:') }}
            {{ Form::password('repassword', array('class'=>'form-control')) }}
            <span class="error-msg">{{ $errors->first('repassword') }}</span>
        </div>
        {{ Form::submit('Update', array('class'=>'remove-input-style btn-block btn-primary')) }}
    {{ Form::close() }}
</div>
@stop