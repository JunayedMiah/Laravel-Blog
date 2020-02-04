@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>View Individual Student</h1>
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
         <a href="{{route('student')}}"class="btn btn-danger">Add Student</a>
         <a href="{{route('all_student')}}"class="btn btn-info">All Student</a>
         <hr>
         <div class="">
           <ol>
             <p class="pb-3"><label style="font-weight: bold;">Student Name: </label>  {{$student->name}}</p>
             <h3 class="pb-3">Student Email:<hr> {{$student->email}}</h3>
             <p class="pb-3">Student Phone No.: {{$student->phone}}</p>
           </ol>
         </div>


       </div>
     </div>
   </div>

   <hr>

@endsection
