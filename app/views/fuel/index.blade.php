@extends('layouts.skeleton')

@section('content')
    <div class="tcenter">    
        {{ link_to('fuel/create', 'Add trip', array('class'=>'btn-lg btn-warning ib vmiddle right-offset')) }}
        @if ($fuel !== 0)
        <div class="small-container ib valign">Your last added fuel is <p class="tcenter">{{ $fuel }}</p> liters</div>
        @endif
    </div>
    @if (count($trips) > 0)
    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th class="mobile-hide">Model</th>
            <th class="mobile-hide">Mark</th>
            <th>Fuel station</th>
            <th>Fuel quantity</th>
            <th>Trip</th>
            <th>Trip type</th>
        </tr>
        @foreach ($trips as $trip)
        <tr>
            <td class="mobile-hide">{{ $trip->car_model }}</td>
            <td class="mobile-hide">{{ $trip->car_mark }}</td>
            <td>{{ $trip->fuel_station_name }}</td>
            <td>{{ $trip->quantity }}</td>
            <td>{{ $trip->trip }}</td>
            <td>{{ $trip->trip_type }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <p>Do not have added trips yet!</p>
    @endif
@stop