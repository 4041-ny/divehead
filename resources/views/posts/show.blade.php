<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
    <div class="text-center">
    <h1>編集部屋<h1>
    <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスクタイトル</label>
                         <p clas='title'>{{ $post->title }}</p>
                        
                </div>
            </div>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <div class="category">
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク種類</label>
                            <p class='category'>{{ $post->category->name }}</p> 
                    </div>
                </div>
                <div class="limit">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">期日</label>
                        <p class='limit'>{{ $post->limit }}</p> 
                                
                    </div>
            </div>
            <div class="body">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク詳細</label>
                      <p class='body'>{{ $post->body }}</p> 
                        
                </div>
            </div>
        </div>    
         <div class="mt-6 grid">
          <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
            </button>
            　</form>          
           <div class="footer">
          <a href="/">タスク一覧へ戻る</a>
        </div>
  </x-slot>
</x-app-layout>
