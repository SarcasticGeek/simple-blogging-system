@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Publish</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    @foreach ($articles as $article)
                    <tbody>
                        <tr>
                        <td><a href="/article/{{$article->id}}">{{$article->title}}</a></td>
                        <td><a class="btn btn-primary btn-xs" href="/article/{{$article->id}}/{{$article->is_published ? "unpublish" : "publish"}}"><span class="glyphicon glyphicon-upload">{{  $article->is_published ? "Unpublish" : "Publish" }}</span></a></td>
                        <td><a class="btn btn-primary btn-xs" href="/article/{{$article->id}}/edit"><span class="glyphicon glyphicon-pencil">Edit</span></a></td>
                        <td><a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash">Delete</span></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
