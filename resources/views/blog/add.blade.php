@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="create">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                        <label for="tags">Tags</label>
                        <p>Tags with hastage like #Hey </p>
                        <input type="text" class="form-control" id="tags" name="tags" required>
                      </div>
                <div class="form-group">
                  <label for="body">Body:</label>
                  <textarea class="form-control" rows="5" name="body"placeholder="Say something..."></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection
