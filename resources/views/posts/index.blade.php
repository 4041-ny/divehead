<x-app-layout>
<x-slot name="header">
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->
@vite(['resources/css/app.css','resources/js/app.js'])

</x-slot>
<x-slot name="slot">
        <h1>Dive Head</h1>
          <a href="/posts/create">タスク作成</a>
          <div class='posts'>
            @foreach ($posts as $post)
              <div class='post'>
                    <a href= "/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                    </form>
                </div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            @endforeach
            
        </div>
             <div class="todo-list">
                  <div class="item-area-incomplete">
                      <p class="body">YOURTASK</p>
                      <ul>
                          <!-- ここにTODOリストを追加する -->
                      </ul>
                  </div>
                  <div class="item-area-complete">
                      <p class="ttl">COMPLETE!</p>
                      <ul>
                          <!-- ここに完了リストを追加する -->
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
            {{ Auth::user()->name}}
            <div class='paginate'>
              {{ $posts->links() }}
            </div>
  </x-slot>
</x-app-layout>