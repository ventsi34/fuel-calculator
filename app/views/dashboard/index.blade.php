@extends('layouts.skeleton')

@section('content')
    <div class="tcenter">    
        {{ link_to('fuel/create', 'Add trip', array('class'=>'btn-lg btn-warning ib vmiddle right-offset')) }}
        <div class="small-container ib valign">Average consumption <p class="tcenter">{{ $averageConsumption }}</p> liters</div>
    </div>
@stop