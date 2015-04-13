<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fuel calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('css/main.css'); }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/npm.js'); }}
        @yield('header-addon')
    </head>
    <body>
        @yield('site')