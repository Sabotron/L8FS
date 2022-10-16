<x-layout>  
<x-slott>  
<div>
  <h1>{{$post ->title }}</h1>
  <p>
    By <a href="#">{{$post->user   b->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
  </p>

</div>
<div>
  {!! $post-> body !!}
</div>
<a href="/">Volver</a>

</x-slot>
 </x-layout>  