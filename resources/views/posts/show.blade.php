@extends('layouts.layout')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('public/frontend/img/write-post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Post Details</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <div class="card">
          <img class="card-img-top" src="{{ URL::to($post->image) }}">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <span class="badge badge-secondary">{{ $post->name }}</span>
            <p class="card-text">{{ $post->details }}</p>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection