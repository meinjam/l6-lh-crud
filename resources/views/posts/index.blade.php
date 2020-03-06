@extends('layouts.layout')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('public/frontend/img/write-post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>All posts.</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <table class="table table-striped table-bordered table-hover"> 
            <thead class="bg-secondary text-light">
                <tr>
                    <th>#</th>
                    <th>Post title</th>
                    <th>Category ID</th>
                    <th>Image</th>
                    <th>Viewing</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->name}}</td>
                        <td><img src="{{ URL::to($row->image) }}" alt="" height="50"></td>
                        <td><a href="{{URL::to('posts/'. $row->id)}}" class="btn btn-success">view</a></td>
                        <td><a href="{{URL::to('posts/'. $row->id . '/edit')}}" class="btn btn-info">Edit</a></td>
                        <td><a href="{{URL::to('posts/'. $row->id . '/delete')}}" id="delete" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection