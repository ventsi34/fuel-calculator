@extends('layouts.basic')

@section('header')
<div class="col-md-5">
    @include('layouts.menu')
    <p>{{ Auth::user()->email }}</p>
</div>
@stop