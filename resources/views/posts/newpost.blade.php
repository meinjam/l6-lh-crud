@extends('layouts.layout')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('public/frontend/img/write-post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Write New Post?</h1>
            <span class="subheading">Add post from here. </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @include('layouts.error')
        <p>
          <a href="{{ url('/category') }}" class="btn btn-info" style="text-decoration: none;">All Category</a>
          <a href="{{ url('/addcategory') }}" class="btn btn-danger" style="text-decoration: none;">Add Category</a>
          <a href="{{ url('/posts') }}" class="btn btn-info" style="text-decoration: none;">All Posts</a>
        </p>
        <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" placeholder="Post Title" id="name">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Category</label>
              <select name="category_id" id="" class="form-control">
                @foreach ($category as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" name="image" class="form-control" placeholder="Post Image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea name="details" rows="5" class="form-control" placeholder="Message"></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>
    
@endsection