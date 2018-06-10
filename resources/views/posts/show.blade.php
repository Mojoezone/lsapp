@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <hr />
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="card-title">{{$post->title}}</h1>
            <img class="img-fluid" src="/storage/cover_images/{{$post->cover_image}}" />
            <div class="card-text">
                {{-- these !! parsing the html tag to the blade system --}}
                {!! $post->body !!}
            </div>
            <hr />
            <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>

            {{-- if guest don't show and is user Auth show the delete or edit --}}
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                    <hr>
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::Submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                @endif
            @endif
        </div>
    </div>
@endsection