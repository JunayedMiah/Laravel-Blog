<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BoloController extends Controller
{
  
  public function add_category()
  {
    return view('posts.add_category');

  }
  public function store_category(Request $request)
  {
    $validatedData = $request->validate([
       'name' => 'required|unique:categories|max:25|min:4',
       'slug' => 'required|unique:categories|max:25|min:4',
    ]);
    $data=array();
    $data['name']=$request->name;
    $data['slug']=$request->slug;
    $category=DB::table('categories')->insert($data);
    if($category){
      $notification=array(
        'message'=>'Successfully Category Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->route('all_category')->with($notification);
    }else{
      $notification=array(
        'message'=>'Something Went Wrong',
        'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }

  }
  public function all_category()
  {
    $category=DB::table('categories')->get();
    return view('posts.all_category', compact('category'));

  }
  public function view_category($id)
  {
    $category=DB::table('categories')->where('id',$id)->first();
    return view('posts.category_view')->with('cat',$category);
  }
  public function delete_category($id)
  {
    $category=DB::table('categories')->where('id',$id)->delete();
    if($category){
      $notification=array(
        'message'=>'Successfully Category Deleted',
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
  public function edit_category($id)
  {
    $category=DB::table('categories')->where('id',$id)->first();
    return view('posts.edit_category',compact('category'));
  }
  public function update_category(Request $request,$id)
  {
    $validatedData = $request->validate([
       'name' => 'required|max:25|min:4',
       'slug' => 'required|max:25|min:4',
    ]);
    $data=array();
    $data['name']=$request->name;
    $data['slug']=$request->slug;
    $category=DB::table('categories')->where('id',$id)->update($data);
    if($category){
      $notification=array(
        'message'=>'Successfully Category Updated',
        'alert-type'=>'success'
      );
      return Redirect()->route('all_category')->with($notification);
    }else{
      $notification=array(
        'message'=>'Nothing to Update',
        'alert-type'=>'error'
      );
      return Redirect()->route('all_category')->with($notification);
    }
  }


}
