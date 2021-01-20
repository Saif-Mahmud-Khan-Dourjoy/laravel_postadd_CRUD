@extends('welcome')
@section('content')
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
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       <a href="{{url('add/categorypage')}}" class="btn btn-info mr-5"> Add Category </a>
        <a href="{{route('allcategory')}}" class=" btn btn-warning"> All Category </a>
        
        <br>
        <br>
        <hr>
        <br>
        
        <ol>
        	
        	<li> <span class="text-info font-weight-bold"> Category Name : </span> {{$category->name}}</li>
        	<li> <span class="text-info font-weight-bold"> Category Slug : </span> {{$category->slug}}</li>
        	<li> <span class="text-info font-weight-bold"> Category Updated At : </span> {{$category->created_at}}</li>
        	
        	
        </ol>



    </div>
</div>
</div>


@endsection