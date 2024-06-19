<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;


class SubjectsController extends Controller
{
    public function index(){
        $subjects = Subjects::orderBy('id', 'desc')->get();
        $total = Subjects::count();
        return view('admin.subjects.home', compact(['subjects', 'total']));
    }

    public function create(){
        return view('admin.subjects.create');
    }
    public function save(Request $request){
       $validation = $request->validate([
        'subject_code' => 'required',
        'subject_name' => 'required',
        'grade' => 'required',
        'instructor' => 'required',

       ]);
       $data = Subjects::create($validation);
       if($data) {
        session()->flash('success', 'Subject Added Succesfully');
        return redirect(route('admin/subjects'));
       }
       else{
        session()->flash('error', 'Some problem occur');
        return redirect(route('admin.subjects/create'));
       }
    
       
    }
    public function delete($id){
        $subjects = Subjects::findOrFail($id)->delete();
        if($subjects) {
            session()->flash('success', 'Subject Deleted Succesfully');
            return redirect(route('admin/subjects'));
           }
           else{
            session()->flash('error', 'Product not deleted');
            return redirect(route('admin.subjects'));
           }
    }
    public function edit($id){
        $subjects = Subjects::findOrFail($id);
        return view('admin.subjects.update', compact('subjects'));
    }

    public function update(Request $request,$id){
        $subjects = Subjects::findOrFail($id);
        $subject_code = $request->subject_code;
        $subject_name = $request->subject_name;
        $grade = $request->grade;
        $instructor = $request->instructor;

        $subjects->subject_code = $subject_code;
        $subjects->subject_name = $subject_name;
        $subjects->grade = $grade;
        $subjects->instructor = $instructor;

        $data = $subjects->save();
        if($data) {
            session()->flash('success', 'Subject Updated Succesfully');
            return redirect(route('admin/subjects'));
           }
           else{
            session()->flash('error', 'Some problem occur');
            return redirect(route('admin.subjects/update'));
           }

    }
    
}
