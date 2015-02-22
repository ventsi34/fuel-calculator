@extends('layouts.skeleton')

@section('content')
    {{ Form::open(['route' => 'fuel.store']) }}
        <div>
            <h4>Old fuel</h4>
            <div>
                {{ Form::label('kilometres', 'km:') }}
                {{ Form::number('trip', Input::old('trip')) }}
                {{ $errors->first('trip') }}
            </div>
            <div>
                {{ Form::label('drive_type', 'Drive type:') }}
                {{ Form::select('trip_type_id', $data['tripType']) }}
                {{ $errors->first('trip_type_id') }}
            </div>
        </div>
        <div>
            <h4>New fuel</h4>
            <div>
                {{ Form::label('quantity', 'Quantity/Litres:') }}
                {{ Form::number('quantity', Input::old('quantity')) }}
                {{ $errors->first('quantity') }}
            </div>
            <div>
                {{ Form::label('petrol_station', 'Petrol station:') }}
                {{ Form::select('fuel_station_id', $data['fuelStations']) }}
                {{ $errors->first('fuel_station_id') }}
            </div>
        </div>
        {{ Form::submit('Add') }}
    {{ Form::close() }}
@stop