<x-app-layout>
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->
@vite(['resources/css/app.css','resources/js/app.js'])
<script src="/path/to/anime.min.js"></script>
<x-slot name="slot">
      <div class="wrapper">
        <div class="square" id="elem"></div>
        <div class="square" id="elem2"></div>
        <div class="square" id="elem3"></div>
      </div>
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white  sm:mt-10 md:p-10">
      <div class="grid grid-cols-2">
        <div class="item-center text-center">
          <div class="font-extrabold">1日に1回の「やってみる」</div>
        </div>
        <div>
            <button type="button" id="form-button" class="w-2/3 py-3 px-4  inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white text-sm font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
              <a href="/posts/create">Let's dive</a>
            </button>
        </div>
      </div>
    </div>
  </div>  
    <div class="mt-5 p-4 z-10 bg-gray border rounded-xl sm:mt-10 md:p-10">
           <div class="w-full text-white bg-gray-800  rounded-xl">
                    <div class="text-center text-2xl">
                        <p class="ttl">TASK MISSION</p>
                    </div>
                </div>
                    <div class='posts'>
                            <ul>
                                @foreach ($posts as $post)
                                <div class='post'>
                                    <div class="mx-auto max-w-lg text-center m-8">
                                      <ul class="space-y-4">
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <a href= "/posts/{{ $post->id }}"><div class="text-xl font-medium leading-loose">{{ $post->title }}</h2></a>
                                          </div>
                                        </li>
                                        
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <div class="text-xl font-medium leading-loose">{{ $post->body }}</div>
                                          </div>
                                        </li>
                                        
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <div class="text-xl font-medium leading-loose">
                                            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></div>
                                          </div>
                                        </li>
                                        
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5H18V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <div class="text-xl font-medium leading-loose">{{ $post->limit }}</div>
                                          </div>
                                        </li>
                                        
                                      </ul>
                                    </div>
                                    <div class="flex flex-row md:justify-between">
                                      <form action="/completion/{{$post->id}}" method='post'>
                                        @csrf
                                        <div onclick="animetion({{ $post->id }})" class="font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all inline-flex items-center gap-1.5 rounded-lg  border-gray-800 bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm">
                                            <input type="submit" value="完了"/>
                                        </div>
                                    </form>
                                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                              <button type="button" onclick="deletePost({{ $post->id }})"class="inline-flex items-center gap-1.5 rounded-lg border border-red-500 bg-red-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-red-700 hover:bg-red-200 focus:ring focus:ring-red-200 disabled:cursor-not-allowed disabled:border-red-300 disabled:bg-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="h-4 w-4">
                                                  <path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0Zm-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2h7.5Zm2.5 6.5a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0v-10Zm5-1a1 1 0 0 0-1 1v10a1 1 0 1 0 2 0v-10a1 1 0 0 0-1-1Z" />
                                                </svg>
                                                削除
                                            </button>
                                    </form>
                                    </div>
                                @endforeach
                                </ul>
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
                    <script>
                          if (confirm('1日1回しか使えません。はいを選択後クリックできなくなります。'))
                          const clickTarget = document.getElementById('from-button');
                          const itemId = 'from-button';
                          
                          // 24時間後に再アクティブにする関数
                          function reactivateItem() {
                              // アイテムを再アクティブにするための処理をここに記述
                              console.log(`Item ${itemId} is now reactivated!`);
                          
                          // クリックされたときに呼び出される処理
                          function handleClick() {
                              // タイマーをセットして24時間後に再アクティブにする
                              setTimeout(reactivateItem, 24 * 60 * 60 * 1000); // 24時間後（ミリ秒単位
                              // ここで何らかの処理を行う...
                          }
                        // 例としてボタンがクリックされた場合を想定
                        const button = document.getElementById("yourButtonId");
                        button.addEventListener("click", handleClick);
                                            </script>
                <div class=" flex flex-row">
                    <div class='paginate'>
                        {{ $posts->links() }}
                    </div>
                </div>
          </div>
    </div>
</x-slot>
</x-app-layout>


   