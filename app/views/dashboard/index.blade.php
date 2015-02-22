@extends('layouts.skeleton')

@section('content')
    <p>Hello, {{ Auth::user()->email }}</p>
@stop