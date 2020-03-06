@extends('layouts.layout')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('public/frontend/img/write-post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>All Students</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
          <p>
              <a href="{{ url('/student/create') }}" class="btn btn-success" style="text-decoration: none;">Add Student</a>
          </p>
        <table class="table table-striped table-bordered table-hover"> 
            <thead class="bg-secondary text-light">
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Phone Number</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td><a href="{{ URL::to('student/'. $student->id . '/edit') }}" class="btn btn-info">Edit</a></td>
                    <td><a href="{{ URL::to('student/'. $student->id . '/delete') }}" class="btn btn-danger" id="delete">Delete</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
        {{$students->links()}}
      </div>
    </div>
  </div>