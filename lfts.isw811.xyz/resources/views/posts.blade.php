@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <div>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title}} <!-- blade-->
                </a>
            </h1>
        </div>
        <div>{{$post->excerpt}}</div>
    @endforeach
@endsection