@extends('layouts.skeleton')

@section('header-addon')
    {{ HTML::script('js/main.js'); }}
    {{ HTML::script('js/Chart.min.js'); }}
@stop

@section('content')
<h2>Average fuel consumption</h2>
{{ Form::open(['route' => 'stats.index', 'method' => 'get']) }}
    {{ Form::select('filter_type', [
        'average' => 'Average consumption',
        'byStation' => 'Average by fuel station'
    ], $data['defaultFilter'], ['class'=>'submit-on-change']) }}
{{ Form::close() }}
@if ($data['defaultFilter'] == 'byStation')
    @include('stats.station', $data)
@else
    @include('stats.average', $data)
@endif
@stop
