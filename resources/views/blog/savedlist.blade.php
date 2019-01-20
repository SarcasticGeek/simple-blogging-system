@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Save/Unsaved</th>
                    </thead>
                    @foreach ($articles as $article)
                    <tbody>
                        <tr>
                        <td><a href="/article/{{$article->id}}">{{$article->title}}</a></td>
                        <td><a class="btn btn-primary btn-xs" href="/article/{{$article->id}}/{{  $article->saved ? "unsave" : "save" }}"><span class="glyphicon glyphicon-upload">{{  $article->saved ? "Unsave" : "Save" }}</span></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
