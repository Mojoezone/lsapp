@extends('layouts.app')

@section('content')
    <h3>Posts</h3>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card bg-light">
                <div class="card-body">
                    {{-- linking each post with the $post -> id  --}}
                    <h3 class="card-title">
                        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h3>
                    <small>Written on {{$post->created_at}}</small>
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