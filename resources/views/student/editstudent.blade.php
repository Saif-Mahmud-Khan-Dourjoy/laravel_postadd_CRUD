@extends('welcome')
@section('content')
 <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/img/post-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Man must explore, and this is exploration at its greatest</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       <a href="{{URL::to('student/create')}}" class="btn btn-info mr-5"> Add Student </a>
        <a href="{{URL::to('student')}}" class=" btn btn-warning"> All Student </a>
        
        <br>
        <br>
        <hr>
        <br>
         @if ($errors->any())
        <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           </ul>
        </div>
         @endif
         
        <form action="{{URL::to('student/'.$student->id)}}" method="post">
          @csrf
          @method('PUT')

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" value="{{$student->name}}" placeholder=" Name" id="name" name="name">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="text" class="form-control" value="{{$student->email}}" placeholder="Email" id="email" name="email">
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Phone</label>
              <input type="text" class="form-control" value="{{$student->phone}}" placeholder="Phone" id="phone" name="phone">
              <p class="help-block text-danger"></p>
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
