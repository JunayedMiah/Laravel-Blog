@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Students </h1>
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
         <a href="{{route('all_student')}}"class="btn btn-info">All Student</a>
         <hr><br>
         <h3>New Student Insert</h3>
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
         <form action="{{route('store_student')}}" method="post">
           @csrf
           <div class="control-group">
             <div class="form-group ">
               <label>Student Name</label>
               <input type="text" class="form-control" placeholder="Student Name" name="name" >

             </div>
           </div>
           <br>
           <div class="control-group">
             <div class="form-group ">
               <label>Student Email</label>
               <input type="text" class="form-control" placeholder="Student Email" name="email" >

             </div>
           </div>

           <br>
           <div class="control-group">
             <div class="form-group ">
               <label>Student Phone</label>
               <input type="text" class="form-control" placeholder="Student Phone" name="phone" >

             </div>
           </div>

           <br>
           <div id="success"></div>
           <div class="form-group">
             <button type="submit" class="btn btn-primary">Submit</button>
           </div>
         </form>
       </div>
     </div>
   </div>

   <hr>

@endsection
