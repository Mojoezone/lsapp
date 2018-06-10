<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- if there no name in .ENV file use second param --}}
    <title>{{ config('app.name', 'LSAPP') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- link the css from the public folder with bs and css compiled file --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    
        @include('inc.navbar')
        <main class="container py-4">
            @include('inc.messages')
            {{-- (@yield) within the layout that your pages which are extending the template will put their content into. --}}
            @yield('content')
        </main>
    </div>
<script src="{{asset('js/app.js')}}"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            // give the textarea an id -> article-ckeditor
                CKEDITOR.replace( 'article-ckeditor' );
        </script>
</body>
</html>
