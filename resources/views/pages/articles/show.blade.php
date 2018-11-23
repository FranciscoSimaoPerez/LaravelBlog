@extends('layouts.app')

@section('content')
<a href="/articles" class="btn btn-primary">Go back</a>
<hr>
<div>
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
    <a href="{{ route('articles.edit',[$article->id])}}" class="btn btn-primary">Editar</a>
<div>
@endsection