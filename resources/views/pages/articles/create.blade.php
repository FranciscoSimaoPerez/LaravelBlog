@extends('layouts.app')

@section('content')
<h1>Create Articles</h1>
<a href="{{ route('articles.index') }}" class="btn btn-primary">Go back</a>
<hr>
<div>
    <div class="jumbotron bg-light">
        <form action="{{ route('articles.store') }}" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" id="title" type="text" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" placeholder="Content"></textarea>
            </div>
            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="checkbox" name="featured" id="featured">
            </div>
            @csrf
            <input type="submit" value="submit" class="btn btn-success">
        </form>
    </div>
<div>
@endsection
