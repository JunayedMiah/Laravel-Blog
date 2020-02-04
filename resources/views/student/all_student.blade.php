@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>ALL Students Are Here</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
   <div class="container">
     <div class="row">
       <div class="col-lg-10  mx-auto">
         <a href="{{route('student')}}"class="btn btn-danger">Add Student</a>
         <hr>

         <table class="table table-responsive">
           <tr>
             <th>SL</th>
             <th>Student Name</th>
             <th>Student Email</th>
             <th>Student Phone</th>
             <th>Action</th>
           </tr>
           @foreach($student as $row)
           <tr>
             <td>{{$row->id}}</td>
             <td>{{$row->name}}</td>
             <td>{{$row->email}}</td>
             <td>{{$row->phone}}</td>
             <td>
               <a href="{{URL::to('edit_student/'.$row->id)}}" class="btn btn-sm btn-danger" style="font-size: 10px;">Edit</a>
               <a href="{{URL::to('delete_student/'.$row->id)}}" class="btn btn-sm btn-info" id="delete" style="font-size: 10px;">Delete</a>
               <a href="{{URL::to('view_student/'.$row->id)}}" class="btn btn-sm btn-success" style="font-size: 10px;">View</a>
             </td>
           </tr>
           @endforeach
         </table>
       </div>
     </div>
   </div>

   <hr>

@endsection
