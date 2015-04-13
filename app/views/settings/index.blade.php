@extends('layouts.skeleton')

@section('content')
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    <div class="tcenter bottom-offset">
        {{ link_to('car/'. $car->car_id .'/edit/', 'Change your car info', array('class'=>'btn-lg btn-warning ib right-offset')) }}
        {{ link_to('settings/'. Auth::id() .'/edit', 'Change your password', array('class'=>'btn-lg btn-danger ib')) }}
    </div>
    <div class="tcenter">
        <div class="small-container ib right-offset">Car mark: <p class="tcenter">{{ $car->car_mark }}</p></div>
        <div class="small-container ib right-offset">Car model: <p class="tcenter">{{ $car->car_model }}</p></div>
        <div class="small-container ib right-offset">Car trip: <p class="tcenter">{{ $car->car_km }}</p></div>
    </div>
@stop