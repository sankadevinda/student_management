<?php

namespace App\Http\Controllers;

use domain\Facade\StudentFacade;
use Illuminate\Http\Request;

class StudentController extends  PearentController
{
    public function index()
    {
       $response['students'] = StudentFacade::all();
        return view('Pages.Student.index')->with($response);
    }

    public function store(Request $request)
    {

        StudentFacade::store($request->all());
        return redirect()->back();
    }

    public function delete( $students_id)
    {

        StudentFacade::delete($students_id);
        return redirect()->back();
    }

    public function status( $students_id)
    {

        StudentFacade::status($students_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['students']=StudentFacade::get($request->students_id);
        return view('Pages.Student.edit')->with($response);
    }



    public function update(Request $request , $students_id){
        StudentFacade::update($request->all() , $students_id);
        return redirect()->back();
    }
}
