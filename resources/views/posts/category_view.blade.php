@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>View Your Categories</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
   <div class="container">
     <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto">
         <a href="{{route('add_category')}}"class="btn btn-danger">Add Category</a>
         <a href="{{route('all_category')}}"class="btn btn-info">All Category</a>
         <hr>
         <div class="">
           <ol>
             <li>Category Name: {{$cat->name}}</li>
             <li>Category Slug:{{$cat->slug}}</li>
             <li>Created At:{{$cat->created_at}}</li>
           </ol>
         </div>


       </div>
     </div>
   </div>

   <hr>

@endsection
