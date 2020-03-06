@extends('layouts.layout')
@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/frontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach ($posts as $post)
          <div class="post-preview">
            <a href="{{URL::to('posts/'. $post->id)}}">
              <img src="{{ URL::to($post->image) }}" class="img img-fluid" alt="post image">
              <h2 class="post-title">{{$post->title}}</h2>
            </a>
            <p class="post-meta">Category
              <a href="#">{{$post->name}}</a>
              on Slug {{$post->slug}}</p>
          </div>
          <hr>
        @endforeach
        
        <!-- Pager -->
        <div class="clearfix">
          {{$posts->links()}}
          
        </div>
      </div>
    </div>
  </div>

  <hr>

@endsection