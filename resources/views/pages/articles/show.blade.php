@extends('layouts.app')

@section('content')

<div class="header">
    <div class="mb-4 bg-dark">
        <div class="col pt-2 pb-2">
            <a href="/articles" class="btn btn-primary">Go back</a>
        </div>
    </div>
</div>
<div>
    <div class="container bg-light mt-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <img src="{{asset('storage/cover_images/'.$article->img)}}" style="width: 100%">
                </div>
                <div class="row m-3">
                    <div class="title @if($article->featured == 1) font-weight-bold @endif">
                        <h1>{{$article->title}}</h1>
                    </div>
                </div>
                @if($article->content != null)
                <div class="row m-3">
                    <div class="content @if($article->featured == 1) font-weight-bold @endif">
                        {{$article->content}}
                    </div>
                </div>
                @endif
            </div>
            
        </div>
        <hr>
        <div class="row m-3">
            <small>Created at {{$article->created_at}}</small>
        </div>
        <br>
    </div>
    <div class="mt-3">
        <form  action="{{ route('articles.destroy',[$article->id]) }}" method="POST">
            <a href="{{ route('articles.edit',[$article->id])}}" class="btn btn-warning">Editar</a>
            <input type="submit" value="Delete" class="btn btn-danger">
            @method('DELETE')
            @csrf     
        </form>
    </div>
<div>
@endsection