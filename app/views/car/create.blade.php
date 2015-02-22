@extends('layouts.skeleton')

@section('content')
    {{ Form::open(['route' => 'car.store']) }}
        <div>
            <h4>Car settings</h4>
            <div>
                {{ Form::label('car_mark', 'Mark:') }}
                {{ Form::text('car_mark', Input::old('car_mark')) }}
                {{ $errors->first('car_mark') }}
            </div>
            <div>
                {{ Form::label('car_model', 'Model:') }}
                {{ Form::text('car_model', Input::old('car_model')) }}
                {{ $errors->first('car_model') }}
            </div>
            <div>
                {{ Form::label('car_km', 'Add your full kilometers (sample: 136845):') }}
                <p>{{ Form::number('car_km', Input::old('car_km')) }}</p>
                {{ $errors->first('car_km') }}
            </div>
        </div>
        {{ Form::submit('Add car') }}
    {{ Form::close() }}
@stop