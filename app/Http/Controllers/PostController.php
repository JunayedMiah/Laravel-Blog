<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
  public function post()
  {
    $category=DB::table('categories')->get();
    return view('posts.post',compact('category'));
  }
  public function store_post(Request $request)
  {
    $validatedData = $request->validate([
       'title' => 'required|max:555',
       'details' => 'required',
       'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $data=array();
    $data['title']=$request->title;
    $data['category_id']=$request->category_id;
    $data['details']=$request->details;
    if ($files = $request->file('image')) {
      // Define upload path
      $destinationPath = public_path('frontend/images/'); // upload path
  		// Upload Orginal Image
      $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
      $files->move($destinationPath, $profileImage);
      $data['image']=$profileImage;
      DB::table('posts')->insert($data);
      $notification=array(
        'message'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);

    }else {
      DB::table('posts')->insert($data);
      $notification=array(
        'message'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
  }
  public function all_posts()
  {
    //$post=DB::table('posts')->get();
    $post=DB::table('posts')
             ->join('categories','posts.category_id','categories.id')
             ->select('posts.*','categories.name')
             ->orderBy('posts.id', 'asc')
             ->get();
     return view('posts.all_posts', compact('post'));
  }
  public function view_post($id)
  {
    $post=DB::table('posts')
          ->join('categories','posts.category_id','categories.id')
          ->select('posts.*','categories.name')
          ->where('posts.id',$id)->first();
    return view('posts.posts_view')->with('pos',$post);
  }
  public function edit_post($id)
  {
    $category=DB::table('categories')->get();
    $post=DB::table('posts')->where('id',$id)->first();
    return view('posts.edit_post',compact('category','post'));
  }
  public function update_post(Request $request,$id)
  {
    $validatedData = $request->validate([
       'title' => 'required|max:555',
       'details' => 'required',
       'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $data=array();
    $data['title']=$request->title;
    $data['category_id']=$request->category_id;
    $data['details']=$request->details;
    if ($files = $request->file('image')) {
      // Define upload path
      $destinationPath = public_path('frontend/images/'); // upload path
      // Upload Orginal Image
      $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
      $files->move($destinationPath, $profileImage);
      $data['image']=$profileImage;
      unlink('frontend/images/'.$request->old_photo);
      DB::table('posts')->where('id',$id)->update($data);
      $notification=array(
        'message'=>'Successfully Post Updated',
        'alert-type'=>'success'
      );
      return Redirect()->route('all_posts')->with($notification);

    }else {
      $data['image']=$request->old_photo;
      DB::table('posts')->where('id',$id)->update($data);
      $notification=array(
        'message'=>'Successfully Post Updated',
        'alert-type'=>'success'
      );
      return Redirect()->route('all_posts')->with($notification);
    }
  }
  public function delete_post($id)
  {
    $post=DB::table('posts')->where('id',$id)->first();
    $image=$post->image;
    $delete=DB::table('posts')->where('id',$id)->delete();
    if($delete){
      unlink('frontend/images/'.$image);
      $notification=array(
        'message'=>'Successfully Post Deleted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }else{
      $notification=array(
        'message'=>'Something Went Wrong',
        'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }
  }

}
