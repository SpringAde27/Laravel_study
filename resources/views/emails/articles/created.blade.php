<h1>
    {{ $article->title }}
    <small>{{ $article->user->name }}</small>
</h1>
<hr>
<p>
    {{ $article->content }}
    <small>{{ $article->created_at }}</small>
</p>
<hr>
<br>
<br>
<div style="text-align: center;">
    <img src="{{ $message->embed(storage_path('cat.png')) }}" alt="">
</div>
<footer>
    이 메일은 {{ config('app.url') }}에서 보냈습니다.
</footer>