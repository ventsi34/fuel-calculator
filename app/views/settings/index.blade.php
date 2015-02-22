@extends('layouts.skeleton')

@section('content')
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    settings
@stop