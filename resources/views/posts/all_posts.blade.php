@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>All Posts Are Here</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
   <div class="container">
     <div class="row">
       <div class="col-lg-10 mx-auto">
         <a href="{{route('post')}}"class="btn btn-danger">Write Posts</a>
         <a href="{{route('all_posts')}}"class="btn btn-success">All Posts</a>
         <hr>

         <table class="table table-responsive">
           <tr>
             <th>SL</th>
             <th>Category id</th>
             <th>Title</th>
             <th>Image</th>
             <th>Action</th>
           </tr>
           @foreach($post as $row)
           <tr>
             <td>{{$row->id}}</td>
             <td>{{$row->name}}</td>
             <td>{{$row->title}}</td>
             <td><img src="{{asset('frontend/images/'. $row->image)}}" style="height: 40px; width:70px;"></td>
             <td>
               <a href="{{URL::to('edit_post/'.$row->id)}}" class="btn btn-sm btn-danger" style="font-size: 10px;">Edit</a>
               <a href="{{URL::to('delete_post/'.$row->id)}}" class="btn btn-sm btn-info"  style="font-size: 10px;">Delete</a>
               <a href="{{URL::to('view_post/'.$row->id)}}" class="btn btn-sm btn-success" style="font-size: 10px;">View</a>
             </td>
           </tr>
           @endforeach
         </table>
       </div>
     </div>
   </div>
   <hr>


@endsection
