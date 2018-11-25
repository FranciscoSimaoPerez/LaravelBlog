@extends('layouts.app')

@section('content')

<div class="header">
    <h1>{{$title}}</h1>
    <div class="mb-4 bg-dark">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('articles.index') }}">
            <div class="col pt-2 pb-2">
                <input name="sort" type="submit" value="Asc" class="btn btn-info">
                <input name="sort" type="submit" value="Desc"  class="btn btn-info ml-2">
            </div>
        </form>
    </div>
</div>
<div class="article-container">
@if (count($articles)>0)
    @foreach ($articles as $article)
    <a href="{{ route('articles.show',[$article->id])}}">
        <div class="container articles bg-light mb-3">
            <div class="row pb-3 pt-3">
                <div class="col-md-5">
                    <img class="fluid-image" src="{{asset('storage/cover_images/'.$article->img)}}" style="width: 100%">
                </div>
                <div class="col">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="title @if($article->featured == 1) font-weight-bold @endif">
                                <h3>{{$article->title}}</h3>
                            </div>
                        </div>
                        @if($article->content != null)
                        <div class="w-100"></div>
                        <div class="col">
                            <div class="content @if($article->featured == 1) font-weight-bold @endif">
                                {{$article->content}}
                            </div>
                        </div>
                        @endif
                        <div class="w-100"></div>
                        <div class="col created-date">
                            <small>Created at {{$article->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            
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
</div>
@endsection
