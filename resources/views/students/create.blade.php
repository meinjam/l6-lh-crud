@extends('layouts.layout')
@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/frontend/img/about-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2 style="font-size: 60px;">Add a student</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable fade show">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <p>
            <a href="{{ url('/student') }}" class="btn btn-dark" style="text-decoration: none;">Go Back</a>
        </p>
        <form action="{{ route('store.student') }}" method="post"> 
              @csrf
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Student Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Student Name" id="name">
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Student Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Student Email" id="name">
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Student Phone Number</label>
                  <input type="number" name="phone" class="form-control" placeholder="Student Phone Number" id="name">
                </div>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Add</button>
              </div>
        </form>

      </div>
    </div>
  </div>

  <hr>
@endsection