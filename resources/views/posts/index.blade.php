@extends('layouts.app')

@section('content')
    <h3>Posts</h3>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                        <a href="/posts/{{$post->id}}"><img class="img-thumbnail" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}" /> </a>
                        </div>
                        <div class="col-sm-8">
                              {{-- linking each post with the $post -> id  --}}
                            <h3 class="card-title">
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                            </h3>
                            <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
                        </div>
                    </div>
                  
                </div>
            </div>
            <br />
        @endforeach
            {{-- for pagination page links --}}
            <br />
        {{$posts->links()}}
    @else
        <p>No posts found!</p>
    @endif
@endsection