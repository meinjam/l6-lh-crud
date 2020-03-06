@extends('layouts.layout')
@section('content')
 <!-- Page Header -->
 <header class="masthead" style="background-image: url({{asset('public/frontend/img/about-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2 style="font-size: 60px;">Category Details</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
  
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ol>
                    <li>Category Name: {{$cate->name}}</li>
                    <li>Category Slug: {{$cate->slug}}</li>
                    <li>Created At: {{$cate->created_at}}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection