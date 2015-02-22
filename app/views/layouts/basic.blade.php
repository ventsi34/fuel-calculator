@extends('layouts.header')
@section('site')
        <div class="container-fluid">
            <div id="header" class="row">
                @yield('header')
            </div>
            @yield('content')
        </div>
    </body>
</html>
@stop