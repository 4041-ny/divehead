<x-app-layout>
    <x-slot name="slot">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </x-slot>
<x-slot name="antialiased">
    <h1 class='title'> {{ $post->title }}</h1>
            <div class="content">
                <div class='content_post'>
                    <h3>本文</h3>
                    <p class='body'>{{ $post->body }}</p>  
                </div>
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            </div>
            <a href="">{{ $post->category->name }}</a>
        <div class="footer">
            <a href="/">戻る</a>
        </div> 
    </x-slot>
</x-app-layout>
    
