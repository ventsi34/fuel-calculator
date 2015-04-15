@extends('layouts.skeleton')

@section('content')
<div class="bottom-offset col-md-4 col-md-offset-4 col-sm-12">
    {{ Form::open(['url' => 'car/'.$car->car_id, 'method' => 'put']) }}
        <div>
            <h4 class="tcenter bottom-offset">Car settings</h4>
            <div class="bottom-offset">
                {{ Form::label('car_mark', 'Mark:') }}
                {{ Form::text('car_mark', $car->car_mark, array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('car_mark') }}</span>
            </div>
            <div class="bottom-offset">
                {{ Form::label('car_model', 'Model:') }}
                {{ Form::text('car_model', $car->car_model, array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('car_model') }}</span>
            </div>
            <div class="bottom-offset">
                {{ Form::label('car_km', 'Add your full kilometers (sample: 136845):') }}
                {{ Form::number('car_km', $car->car_km, array('class'=>'form-control')) }}
                <span class="error-msg">{{ $errors->first('car_km') }}</span>
            </div>
        </div>
        {{ Form::submit('Update', array('class'=>'remove-input-style btn-block btn-primary')) }}
    {{ Form::close() }}
</div>
@stop