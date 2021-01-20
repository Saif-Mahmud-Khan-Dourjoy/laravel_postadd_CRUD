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
      <div class="col-lg-12 mx-auto">
       <a href="{{URL::to('student/create')}}" class="btn btn-info mr-5"> Add Student </a>
        <a href="{{URL::to('student')}}" class=" btn btn-warning"> All Student </a>
        
        <br>
        <br>
        <hr>
        <br>

        <table class="table table-bordered">
          <tr>
            <th> SL </th>
            <th> Name </th>
            <th> Email </th>
            <th> Phone </th>
            <th class="text-center"> Action </th>
          </tr>
          @foreach($student as $row)
          <tr>
            <td> {{ $row->id }} </td>
            <td> {{ $row->name }} </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row->phone }} </td>
            <td class="text-center"> 
              <a href="{{url('student/'.$row->id)}}" class="btn-sm btn-success mr-2"> View </a>
              <a href="{{url('student/'.$row->id.'/edit')}}" class="btn-sm btn-info mr-2"> Edit </a>
              <form action="{{URL::to('student/'.$row->id)}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn-sm btn-danger">Delete</button> 
               
              </form>
              <!-- <a href="{{URL::to('student/'.$row->id)}}" class="btn-sm btn-danger delete"> Delete </a> -->

             </td>
            
          </tr>
          @endforeach


        </table>
      
      </div>
    </div>
  </div>


  <hr>

@endsection
