@extends('layouts.layout')
@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/frontend/img/about-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2 style="font-size: 60px;">Edit Category</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="{{ route('update.category', $cate->id) }}" method="post">
            @csrf
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Category Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Category Name" id="name" value="{{$cate->name}}">
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Category Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Category Slug" id="name" value="{{$cate->slug}}">
                </div>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
              </div>
        </form>
      </div>
    </div>
  </div>

@endsection