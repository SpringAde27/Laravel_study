@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>포럼 글 목록</h1>

        <hr>

        <ul>
            @forelse ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">
                        {{ $article->title }}
                    </a>
                    <small>
                        [ by {{ $article->user->name }} ]
                    </small>
                </li>
            @empty
                <p>글이 없습니다.</p>
            @endforelse            
        </ul>
    </div>

    @if ($articles->count())
        <div class="text-center" style="display: flex; justify-content: center;">
            {!! $articles->render() !!}
        </div>
    @endif
@endsection