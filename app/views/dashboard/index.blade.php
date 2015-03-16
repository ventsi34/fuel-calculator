@extends('layouts.skeleton')

@section('content')
    <p>Hello, {{ Auth::user()->email }}</p>
    <p>Average consumption {{ $averageConsumption }} liters</p>
@stop