<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
            <div class="text-center">
            <h1>編集部屋</h1>
            
            <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="title">
                        <div class="mb-4 sm:mb-8">
                            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスクタイトル</label>
                                <input type='text' name='post[title]' value="{{ $post->title }}" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="やってみること"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                        <div class="category">
                            <div class="mb-4 sm:mb-8">
                                <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク種類</label>
                                    <input type='select' name='post[category]' value="{{ $post->category->name}}"class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4"/>
                            </div>
                        </div>
                        <div class="limit">
                            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">作成日</label>
                                    <input type='text' name='post[limit]' value="{{ $post->limit }}"class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="今日"/>                    
                        </div>
                    </div>
                    <div class="body">
                        <div class="mb-4 sm:mb-8">
                            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク詳細</label>
                              <input type='text' name='post[body]' value="{{ $post->body }}" id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="具体的な検討内容、心情でもいいです"/>
                        </div>
                    </div>
                </div>    
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                        <input type="submit" value="保存"/>
                    </button>
            　</form>          
           <div class="footer">
          <a href="/">キャンセル</a>
        </div>
  </x-slot>
</x-app-layout>

 