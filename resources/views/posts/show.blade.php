<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
            <div class="text-center">
                <div class="w-full text-white bg-gray-800 rounded-xl">
                    <div class="text-center text-xl">
                        <p class="ttl">確認画面</p>
                    </div>
                </div>
    <form action="/posts" method="POST">
            @csrf
            <div class="pt-8">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-m font-medium">タスクタイトル</label>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                        <p clas='title'>{{ $post->title }}</p>
                    </svg>
                </div>
            </div>
                <div class="category">
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-m font-medium">タスク種類</label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                <p class='category'>{{ $post->category->name }}</p> 
                                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                            </svg>
                    </div>
                </div>
                    <div class="body">
                        <div class="mb-4 sm:mb-8">
                            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-m font-medium">タスク詳細</label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5H18V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                <p class='body'>{{ $post->body }}</p> 
                            </svg>    
                        </div>
                    </div>
                </div>    
                <div class="mt-6 grid">
                    <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                        <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
                    </button>
                </div>
            　</form> 
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
           <div class="footer">
            <button type="button" class="font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all inline-flex items-center gap-1.5 rounded-lg  border-gray-800 bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm">
                <a href="/">TASKMISSIONに戻る</a>
            </button>
        </div>
  </x-slot>
</x-app-layout>
