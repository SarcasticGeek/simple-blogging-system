@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Unsaved</th>
                    </thead>
                    @foreach ($articles as $article)
                    <tbody>
                        <tr>
                        <td><a href="/article/{{$article->id}}">{{$article->title}}</a></td>
                        <td><a class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-upload">Unsaved</span></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
