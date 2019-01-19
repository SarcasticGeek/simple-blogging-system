@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/action_page.php">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title">
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
