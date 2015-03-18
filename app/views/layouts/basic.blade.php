@extends('layouts.header')
@section('site')
        <div class="container-fluid">
            <div id="header" class="row">
                @yield('header')
            </div>
            <div class="main-container col-sm-12 col-md-10 col-md-offset-1">
            @yield('content')
            </div>
        </div>
    </body>
</html>
@stop