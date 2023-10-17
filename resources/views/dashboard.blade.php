<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <div>
                <div class="w-full text-white bg-indigo-700 rounded-xl">
                    <div class="text-center">
                        <p class="ttl">YOURTASK</p>
                            </div>
                                </div>
                        <div class='posts'>
                            <ul>
                                @foreach ($posts as $post)
                                <div class='post'>
                                    <a href= "/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                                        <p class='body'>{{ $post->body }}</p>
                                            <p class='limit'>{{ $post->limit }}</p>
                                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                                            </form>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                </div>
                
                <div>
                    <div class="w-full text-white bg-indigo-700 rounded-xl">
                             <div class="text-center"><p class="ttl">COMPLETE!</p></div>
                              <ul>
                                  <!-- ここに完了リストを追加する -->
                              </ul>
                    </div>
                </div>
            </div>
                        <script>
                            function deletePost(id) {
                            'use strict'
                            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                                    }
                                }
                        </script>
                              
                <div class="text-center items-center">
                    <div class='paginate'>
                        <div class=" inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            
                        </div>
                    </div>
                </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
