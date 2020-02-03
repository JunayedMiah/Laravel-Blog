@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>View Your Posts</h1>
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
         <a href="{{route('post')}}"class="btn btn-danger">Write Posts</a>
         <a href="{{route('all_posts')}}"class="btn btn-info">All Posts</a>
         <hr>
         <div class="">
           <ol>
             <p class="pb-3"><label style="font-weight: bold;">Category Name: </label>  {{$pos->name}}</p>
             <h3 class="pb-3">{{$pos->title}} :</h3>
             <img src="{{asset('frontend/images/'. $pos->image)}}" style="height: 310px;">
             <p class="pb-3"> {{$pos->details}}</p>
           </ol>
         </div>


       </div>
     </div>
   </div>

   <hr>

@endsection
