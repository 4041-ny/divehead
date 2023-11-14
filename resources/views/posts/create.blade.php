<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot"><div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
    
    <div class="text-center">
    <h1>今日はどんなコーデを記録しますか</h1>
    <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">コーデポイント</label>
                    <input type="text"name="post[title]" d="hs-feedback-post-comment-name-1" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="飛び込むこと"><value="{{ old('post.title') }}"/>
                    <p class='title__error' style='color:red'> {{ $errors->first('post.title') }}</p>
                </div>
            </div>
                <div class="category">
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">コーデ系統</label>
                            <select name="post[category_id]" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            <div class="body">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">コーデ詳細</label>
                      <textarea name="post[body]"  id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="具体的な検討内容、心情でもいいです">{{ old('post.body') }}</textarea>
                        <p class='body__error' style='color:red'> {{ $errors->first('post.body') }}</p>
                </div>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
        </div>    
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
            <input type="submit" value="保存"/>
            </button>
                <div class="footer">
                  <a href="/">キャンセル</a>
                </div>
           </form>
  </x-slot>
</x-app-layout>
