@extends('layouts.app')

@section('content')
<a href="/articles" class="btn btn-primary">Go back</a>
<hr>
<div>
    <div class="jumbotron articles bg-light">
        <div class="row">
            <div class="col-8">
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
            <div class="col-4">
                <img src="/img.png" style="width: 100%">
            </div>
        </div>
        <small>Created at {{$article->created_at}}</small>
    </div>
    
    <form  action="{{ route('articles.destroy',[$article->id]) }}" method="POST">
        <a href="{{ route('articles.edit',[$article->id])}}" class="btn btn-warning">Editar</a>
        <input type="submit" value="Delete" class="btn btn-danger">
        @method('DELETE')
        @csrf     
    </form>
<div>
@endsection