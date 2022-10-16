<x-layout>

<x-slot name="content">

    @foreach ($posts as $post)
        <div>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title}} <!-- blade-->
                </a>
            </h1>
            <p>
                <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>

        </div>
        <div>{{$post->excerpt}}</div>
    @endforeach

</x-slot>
</x-layout>  