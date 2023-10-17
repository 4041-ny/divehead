<x-app-layout>
    <x-slot name="slot">
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
        <div class="footer">
            <a href="/">戻る</a>
        </div> 
    </x-slot>
</x-app-layout>
<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-gray-800 dark:border-gray-700">
    <div class="text-center">
    <h1>やることはなんですか</h1>
    <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">タスクタイトル</label>
                        <input type="text"name="post[title]" d="hs-feedback-post-comment-name-1" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="飛び込むこと"><value="{{ old('post.title') }}"/>
                         <p class='title'>{{ $post->title }}</p>   
                </div>
            </div>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <div class="category">
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">タスク種類</label>
                          <p class="category">{{ $post->category->name }}</p>
                    </div>
                </div>
                <div class="limit">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">期日</label>
                            <input type="text"name="post[limit]" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="いつまでに完了しますか"><value="{{ old('post.limit') }}"/>
                             <p class="limit">{{ $post->limit }}</p>
                </div>
            </div>
            <div class="body">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">タスク詳細</label>
                      <textarea name="post[limit]"  id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="具体的な検討内容、心情でもいいです">{{ old('post.body') }}</textarea>
                    <p class='body'>{{ $post->body }}</p>  
                </div>
            </div>
        </div>    
         <div class="mt-6 grid">
          <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all dark:focus:ring-offset-gray-800">
            
            </button>
            　</form>          
           <div class="footer">
          <a href="/">キャンセル</a>
        </div>
  </x-slot>

    
