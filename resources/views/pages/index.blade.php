@extends('layouts.app')

{{-- wrapped them around section so it can be use as the content with other file like the react div --}}
@section('content')
<div class="jumbotron text-center">
{{-- pass the variable from the PagesController like in javascript --}}
        <h1>{{$title}}</h1>
        <p>This is a laravel application from the Traversy Youtube series.</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
</div>
@endsection