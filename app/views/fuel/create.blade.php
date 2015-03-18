@extends('layouts.skeleton')

@section('content')
    <div class="bottom-offset col-md-4 col-md-offset-4 col-sm-12">
    <h2 class="tcenter bottom-offset">Adding trip</h2>
    {{ Form::open(['route' => 'fuel.store']) }}
        @if($data['chargesCount'] > 0)
        <div class="bottom-offset">
            <h4 class="tcenter bottom-offset">Old fuel</h4>
            <div class="bottom-offset">
                {{ Form::label('kilometres', 'km:') }}
                {{ Form::text('trip', Input::old('trip'), array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('trip') }}</span>
            </div>
            <div class="bottom-offset">
                {{ Form::label('drive_type', 'Drive type:') }}
                {{ Form::select('trip_type_id', $data['tripType'], '', array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('trip_type_id') }}</span>
            </div>
        </div>
        @endif
        <div class="bottom-offset">
            <h4 class="tcenter bottom-offset">New fuel</h4>
            <div class="bottom-offset">
                {{ Form::label('quantity', 'Quantity/Litres:') }}
                {{ Form::text('quantity', Input::old('quantity'), array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('quantity') }}</span>
            </div>
            <div class="bottom-offset">
                {{ Form::label('petrol_station', 'Petrol station:') }}
                {{ Form::select('fuel_station_id', $data['fuelStations'], '', array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('fuel_station_id') }}</span>
            </div>
        </div>
        {{ Form::submit('Add', array('class'=>'remove-input-style btn-block btn-primary')) }}
    {{ Form::close() }}
    </div>
@stop