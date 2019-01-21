@extends('layouts.app')

@section('content')
<div class="container">

    @isset($cats)
    <div class="row">
        <!-- Split button -->
        <div class="btn-group">
          <button type="button" class="btn">Filter by Cat</button>
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            @foreach ($cats as $cat)
            <li><a href="/cat/{{$cat->id}}/articles">{{$cat->name}}</a></li>
            @endforeach
          </ul>
        </div>
    </div>
    <br />
    @endisset

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
                        @if(isset($article->saved))
                        <td><a class="btn btn-primary btn-xs" href="/article/{{$article->id}}/{{  $article->saved ? "unsave" : "save" }}"><span class="glyphicon glyphicon-upload">{{  $article->saved ? "Unsave" : "Save" }}</span></a></td>
                        @else
                        <td><a class="btn btn-primary btn-xs" href="/article/{{$article->id}}/unsave"><span class="glyphicon glyphicon-upload">Unsave</span></a></td>
                        @endif
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
