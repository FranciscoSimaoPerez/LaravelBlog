@extends('layouts.app')

@section('content')
<a href="/articles" class="btn btn-primary">Go back</a>    
<hr>
<div>
    <div class="jumbotron">
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
<div>
@endsection
