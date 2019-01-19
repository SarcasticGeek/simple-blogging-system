@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$article->title}}</h1>
            <h2>By {{$author}}</h2>
            <p>{{$article->body}}<p>
        </div>
    </div>
</div>
@endsection
