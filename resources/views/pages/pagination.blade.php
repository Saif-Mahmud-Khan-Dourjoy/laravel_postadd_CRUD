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
       <!-- <a href="{{url('add/categorypage')}}" class="btn btn-info mr-5"> Add Category </a> -->
        <!-- <a href="{{route('allcategory')}}" class=" btn btn-warning"> All Category </a> -->
        <a href="{{url('/simplepost')}}" class=" btn btn-warning"> Add Post </a>

        
        <br>
        <br>
        <hr>
        <br>

      <div>  
         @foreach($post as $row)  

           <h3> {{ $row->title }} </h3>
           <h6> {{ $row->name }} </h6>
           <img src="{{ URL::to($row->image) }}" style="height: 300px; width: 600px;" >
           <p> {{ $row->details }} </p>

         @endforeach

        {{ $post->links() }}
      </div>
        </div>
    </div>
  </div>


  <hr>

@endsection