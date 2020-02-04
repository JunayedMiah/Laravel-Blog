<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function student(){
      return view('student.create');
    }

    public function store_student(Request $request)
    {
      $validatedData = $request->validate([
         'name' => 'required|max:25|min:4',
         'phone' => 'required|unique:students|max:12|min:9',
         'email' => 'required|unique:students',
      ]);

      $student = new Student;
      $student->name=$request->name;
      $student->email=$request->email;
      $student->phone=$request->phone;

      $student->save();
      if($student){
        $notification=array(
          'message'=>'Successfully Data Inserted',
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
  public function all_student()
  {
    $student=Student::all();
    return view('student.all_student',compact('student'));
  }
  public function view_student($id)
  {
    $student=Student::find($id);
    return view('student.view_student',compact('student'));
  }
  public function delete_student($id)
  {
    $student=Student::find($id);
    $student->delete();
      $notification=array(
        'message'=>'Successfully Data Deleted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
}
}
