@extends('layout')

@section('content')

  <div>
    <h1>{{$post ->title }}</h1>
  </div>
  <div>
  {!! $post-> body !!}
  </div>
  <a href="/">Volver</a>

@endsection