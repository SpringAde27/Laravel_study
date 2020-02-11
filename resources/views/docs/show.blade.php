@extends('layouts.app')

@stack('styles')
<style>
    .page-header {
        padding-bottom: 9px;
        margin: 40px 0 20px;
        border-bottom: 1px solid #eee;
    }
</style>

@section('content')
    <div class="container">
        <header class="page-header">
            <h1>마크다운 뷰어</h1>
        </header>

        <div class="row">
            <div class="col-md-3 docs__sidebar">
                <aside>{!! $index !!}</aside>
            </div>
        
            <div class="col-md-9 docs__content">
                <article>{!! $content !!}<article>
            </div>
        </div>
    </div>
@endsection