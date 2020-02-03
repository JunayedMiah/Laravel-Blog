@extends('welcome')
@section('Ridoy')
<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('frontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Update Your Post</h1>
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
         <a href="{{route('all_posts')}}"class="btn btn-success">All Posts</a>
         <hr>
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
         <form action="{{url('update_post/'.$post->id)}}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="control-group">
             <div class="form-group ">
               <label>Post Title</label>
               <input type="text" class="form-control" value="{{$post->title}}" name="title">

             </div>
           </div>
           <br>
           <div class="control-group">
             <div class="form-group col-xs-12 ">
               <label>Category</label>
               <select class="form-control" name="category_id">
                 @foreach($category as $row)
                 <option value="{{$row->id}}" <?php if($row->id == $post->category_id) echo "selected"; ?>>{{$row->name}}</option>
                 @endforeach
               </select>
             </div>
           </div>
         </br>
         <div class="control-group">
           <div class="form-group col-xs-12 ">
             <label>Post Old Image:</label>
             <div class="pb-3">
               <img src="{{asset('frontend/images/'. $post->image)}}" class="img-fluid" style="height:200px; width:200px;">
             </div>
             <label for="">Select New Image:</label>
             <input type="file" name="image" value="">
             <input type="hidden" name="old_photo" value="{{$post->image}}">
           </div>
         </div>
         <br>
           <div class="control-group">
             <div class="form-group ">
               <label>Post Details</label>
               <textarea rows="5" class="form-control" placeholder="Details" name="details">
                 {{$post->details}}
               </textarea>

             </div>
           </div>
           <br>
           <div id="success"></div>
           <div class="form-group">
             <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
           </div>
         </form>
       </div>
     </div>
   </div>

   <hr>
@endsection
