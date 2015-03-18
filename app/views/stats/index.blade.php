@extends('layouts.skeleton')

@section('header-addon')
    {{ HTML::script('js/main.js'); }}
    {{ HTML::script('js/Chart.min.js'); }}
@stop

@section('content')
<h2 class="tcenter">Average fuel consumption</h2>
<div class="filter-wrapper tcenter">
{{ Form::open(['route' => 'stats.index', 'method' => 'get']) }}
    {{ Form::select('filter_type', [
        'average' => 'Average consumption',
        'byStation' => 'Average by fuel station'
    ], $data['defaultFilter'], ['class'=>'submit-on-change form-control center']) }}

@if ($data['defaultFilter'] == 'byStation')
    @include('stats.station', $data)
@else
    @include('stats.average', $data)
@endif
@stop
