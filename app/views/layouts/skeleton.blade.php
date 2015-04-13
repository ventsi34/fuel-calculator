@extends('layouts.basic')

@section('header')
<div class="col-sm-12 col-md-10 col-md-offset-1">
    <p class="username">Hello, {{ Auth::user()->email }}</p>
    @include('layouts.menu')
</div>
@stop