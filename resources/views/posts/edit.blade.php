<x-app-layout>
<x-slot name="header">
    @vite(['resources/css/app.css','resources/js/app.js'])
</x-slot>
<x-slot name="slot">
    <body class="antialiased"> 
      <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>YOURTASK</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>タスクを作りましょう</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
        </form>
        <input type="submit" value="保存">
    </div>
    <div class="back">[<a href="/">戻る</a>]</div>
</x-slot>
</x-app-layout>
