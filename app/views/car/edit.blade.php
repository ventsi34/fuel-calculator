@extends('layouts.skeleton')

@section('content')
    {{ Form::open(['url' => 'car/'.$car->car_id, 'method' => 'put']) }}
        <div>
            <h4>Car settings</h4>
            <div>
                {{ Form::label('car_mark', 'Mark:') }}
                {{ Form::text('car_mark', $car->car_mark) }}
                {{ $errors->first('car_mark') }}
            </div>
            <div>
                {{ Form::label('car_model', 'Model:') }}
                {{ Form::text('car_model', $car->car_model) }}
                {{ $errors->first('car_model') }}
            </div>
            <div>
                {{ Form::label('car_km', 'Add your full kilometers (sample: 136845):') }}
                <p>{{ Form::number('car_km', $car->car_km) }}</p>
                {{ $errors->first('car_km') }}
            </div>
        </div>
        {{ Form::submit('Update') }}
    {{ Form::close() }}
@stop