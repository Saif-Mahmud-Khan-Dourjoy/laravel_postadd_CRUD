<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $student=Student::all();
       return view('student/allstudent',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('student.studentviewpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student= new Student;
        $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'email' => 'required|unique:students|max:25|min:4',
        'phone' => 'required|unique:students|max:11|min:9',
    ]);

        $student= new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();

        if($student->save()){
            $notification=array(
            'message'=>'Student Successfully Inserted',
            'alert-type'=>'success',
            );

           return Redirect()->to('student')->with($notification);
        }else{
            $notification=array(
            'message'=>'Student Successfully Not Inserted',
            'alert-type'=>'danger',
            );

            return Redirect()->back()->with($notification);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findorfail($id);
         return view('student/singlestudent',compact('student'));
        // echo "<pre>";
        // return response()->json($student);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::findorfail($id);
        return view('student/editstudent',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $student=Student::findorfail($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();

        if($student->save()){
            $notification=array(
            'message'=>'Student Successfully Updated',
            'alert-type'=>'success',
            );

            return Redirect()->to('student')->with($notification);
        }else{
            $notification=array(
            'message'=>'Student Successfully Not Updated',
            'alert-type'=>'danger',
            );

            return Redirect()->back()->with($notification);
        }
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findorfail($id);
        $std=$student->delete();
        if($std==1){
            $notification=array(
            'message'=>'Student Successfully Deleted',
            'alert-type'=>'success',
            );

       return Redirect()->to('student')->with($notification);
        }
    }
}
