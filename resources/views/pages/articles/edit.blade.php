@extends('layouts.app')

@section('content')
<h1>Edit Article</h1>
<a href="{{ route('articles.show',[$article->id])}}" class="btn btn-primary">Go back</a>
<hr>
<div>
    <div class="jumbotron bg-light">
        <form action="{{ route('articles.update',[$article->id]) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" id="title" type="text" class="form-control" placeholder="Title" value="{{$article->title}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" placeholder="Content">{{$article->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="checkbox" name="featured" id="featured" @if($article->featured == 1) checked @endif>
            </div>
            <div class="form-group">
                <input type="file" name="upload" id="upload">
            </div>
            @method('PUT')
            @csrf
            <input type="submit" value="submit" class="btn btn-success">
        </form>
    </div>
<div>
@endsection
