@extends('layouts.app')

{{-- wrapped them around section so it can be use as the content with other file like the react div --}}
@section('content')
        <h1><?php echo $title; ?></h1>
        <p>This is about page.</p>
@endsection