<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- if there no name in .ENV file use second param --}}
        <title>{{config('app.name', 'LSAPP')}}</title>
        {{-- link the css from the public folder with bs and css compiled file --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
        @yield('content')
        </div>
    </body>
</html>
