@extends('layouts.app')

{{-- wrapped them around section so it can be use as the content with other file like the react div --}}
@section('content')
        <h1>{{$title}}</h1>
        {{-- count if there are more than one in the services array inside of data, set it as each of the item and loop it out --}}
        @if(count($services) > 0)
            <ul>
                @foreach($services as $service)
                    <li>{{$service}}</li>
                @endforeach
            </ul>
        @endif
@endsection