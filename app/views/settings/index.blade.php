@extends('layouts.skeleton')

@section('content')
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    
    <div>
        <p>Car mark: <span>{{ $car->car_mark }}</span></p>
        <p>Car model: <span>{{ $car->car_model }}</span></p>
        <p>Car trip: <span>{{ $car->car_km }}</span></p>
    </div>
    <div>
        {{ link_to('car/'. $car->car_id .'/edit/', 'Change your car info') }}
        {{ link_to('settings/'. Auth::id() .'/edit', 'Change your password') }}
    </div>
@stop