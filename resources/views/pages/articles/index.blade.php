@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Articles</h1>
        @if (count($articles)>0)
            @foreach ($articles as $article)
                <div class="row">
                    <div class="title">
                        {{$article->title}}
                    </div>
                    <div class="content">
                        {{$article->content}}
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <p>No articles found</p>
            </div>
        @endif
    </div>
@endsection
