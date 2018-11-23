@extends('layouts.app')

@section('content')

<h1>Articles</h1>
<div class="Sort">
    <div class="row mb-4">
        <div class="col">
            <input type="button" value="Order Asc" class="btn btn-primary">
            <input type="button" value="Order Desc"  class="btn btn-primary">
        </div>
    </div>
</div>
@if (count($articles)>0)
    @foreach ($articles as $article)
    <a href="{{ route('articles.show',[$article->id])}}">
        <div class="jumbotron articles bg-light">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="title">
                            <h3>{{$article->title}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content">
                            {{$article->content}}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <img src="/img.png" style="width: 100%">
                </div>
            </div>
            <small>Created at {{$article->created_at}}</small>
        </div>
    </a>
    @endforeach
    {{$articles->links()}}
@else
    <div class="row">
        <p>No articles found</p>
    </div>
@endif

@endsection
