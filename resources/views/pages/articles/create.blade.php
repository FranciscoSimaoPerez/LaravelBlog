@extends('layouts.app')

@section('content')
<h1>Create Articles</h1>
<a href="/articles" class="btn btn-primary">Go back</a>
<hr>
<div>
    <div class="jumbotron articles bg-light">
        {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])) }}
        </div>
        <div class="form-group">
            {{ Form::label('content', 'Content') }}
            {{ Form::text('content', '', ['class' => 'form-control', 'placeholder' => 'Content'])) }}
        </div>
        {{ Form::submit('Submit', ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
<div>
@endsection