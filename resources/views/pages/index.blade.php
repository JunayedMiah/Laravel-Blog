@extends('welcome')
@section('Ridoy')
<header class="masthead" style="background-image: url({{asset('frontend/img/home-bg.jpg')}})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Clean Blog</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($post as $row)
    <div class="post-preview">
      <a href="{{URL::to('view_post/'.$row->id)}}">
        <img src="{{asset('frontend/images/'. $row->image)}}" style="height: 300px; ">
        <h2 class="post-title">
          {{$row->title}}
        </h2>

      </a>
      <p class="post-meta">Category
        <a href="{{URL::to('view_post/'.$row->id)}}">{{$row->name}}</a>
        on Slug{{$row->slug}}</p>
    </div>
    <br>
    @endforeach
    <hr>
    <!-- Pager -->
    <div class="clearfix">
      {{$post->links()}}
    </div>
  </div>
</div>
</div>
</div>
<hr>
@endsection
