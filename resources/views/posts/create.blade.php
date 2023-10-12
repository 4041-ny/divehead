<x-app-layout>
<x-slot name="header">
    @vite(['resources/css/app.css','resources/js/app.js'])
</x-slot>
<x-slot name="slot">
    <h1>Dive  Head</h1>
    <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text"name=post[title] placeholder="タスク"><value="{{old('post.title')}}"/>
                <p class='title__error' style='color:red'> {{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>タスク詳細</h2>
                <textarea name="post[body]" placeholder="タスクを整理してみましょう">{{ old('post.body' )}}</textarea>
                <p class='body__error' style='color:red'> {{ $errors->first('post.body' )}}</p>
            </div>
            <div class="category">
                <h2>タスク種類</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="limit">
                <h2>期日</h2>
                <input type="text"name=post[limit] placeholder="いつまでに完了しますか"><value="{{old('post.limit')}}"/>
            </div>
            <input type="submit" value="保存"/>    
            　</form>          
           <div class="footer">
          <a href="/">戻る</a>
        </div>
  </x-slot>
</x-app-layout>