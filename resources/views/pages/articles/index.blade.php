@extends('layouts.app')

@section('content')

<h1>{{$title}}</h1>
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
                <div class="col-7">
                    <div class="row">
                        <div class="title @if($article->featured == 1) font-weight-bold @endif">
                            <h3>{{$article->title}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content @if($article->featured == 1) font-weight-bold @endif">
                            {{$article->content}}
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
                <div class="col-4">
                    <img src="/img.png" style="width: 100%">
                </div>
            </div>
            <small>Created at {{$article->created_at}}</small>
        </div>
    </a>
    @endforeach
    {{ $articles->appends(\Request::except('_token'))->render() }}
@else
<div class="jumbotron bg-light">
    <div class="row">
        <p>No articles found</p>
    </div>
</div>
@endif

@endsection
