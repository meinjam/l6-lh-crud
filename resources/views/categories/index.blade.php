@extends('layouts.layout')
@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/frontend/img/about-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2 style="font-size: 60px;">All Category</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <table class="table table-striped table-bordered table-hover"> 
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Viewing</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->slug}}</td>
                            <td><a href="{{URL::to('category/'. $row->id)}}" class="btn btn-success">view</a></td>
                            <td><a href="{{URL::to('category/'. $row->id . '/edit')}}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{URL::to('category/'. $row->id . '/delete')}}" id="delete" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>

@endsection