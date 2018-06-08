@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <hr />
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="card-title">{{$post->title}}</h1>
            
            <div class="card-text">
                {{-- these !! parsing the html tag to the blade system --}}
                {!! $post->body !!}
            </div>
            <hr />
            <small>Written on {{$post->created_at}}</small>
        </div>
    </div>
@endsection