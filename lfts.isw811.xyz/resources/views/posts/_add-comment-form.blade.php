@auth
<x-panel>
    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">
                Leave your comments below:
            </h2>

        </header>
        <div class="mt-6">
            <textarea class="w-full text-sm focus:outline-none focus:ring" name="body" id="" cols="30" rows="5" require="true" placeholder="Think twice before you type!"></textarea>

            @error('body')
            <span class="text-xs text-red-500">{{$message}}</span>

            @enderror

        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <x-submit-button>Post</x-submit-button>  
    </div>
    </form>
</x-panel>
@else
<p class="font-semibold"> 
    <a href="/register" class="hover:underline">Register</a> or 
    <a href="/login" class="hover:underline">Log in</a> to post a comment!</p>
@endauth