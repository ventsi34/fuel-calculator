@extends('layouts.skeleton')

@section('content')
    {{ link_to('fuel/create', 'Add trip') }}
    @if (count($trips) > 0)
    <table border="1">
        <tr>
            <th>Model</th>
            <th>Mark</th>
            <th>Fuel station</th>
            <th>Fuel quantity</th>
            <th>Trip</th>
            <th>Trip type</th>
        </tr>
        @foreach ($trips as $trip)
        <tr>
            <td>{{ $trip->car_model }}</td>
            <td>{{ $trip->car_mark }}</td>
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