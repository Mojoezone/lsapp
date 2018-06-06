@extends('layouts.app')

{{-- wrapped them around section so it can be use as the content with other file like the react div --}}
@section('content')
{{-- pass the variable from the PagesController like in javascript --}}
        <h1>{{$title}}</h1>
        <p>This is a laravel application from the Traversy Youtube series.</p>
@endsection