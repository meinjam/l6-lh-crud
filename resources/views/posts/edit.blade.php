@extends('layouts.layout')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('public/frontend/img/write-post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Edit Post</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <form action="{{ url('posts/'. $post->id . '/update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Post Title" id="name">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Category</label>
              <select name="category_id" id="" class="form-control">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" <?php if($category->id == $post->category_id) echo "selected" ?> >{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <img src="{{ URL::to($post->image) }}" alt="" width="80px">
              <input type="hidden" name="old_image" value="{{ $post->image }}">
              <label>Post Image</label>
              <input type="file" name="image" class="form-control" placeholder="Post Image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea name="details" rows="5" class="form-control" placeholder="Message">{{ $post->details }}</textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection