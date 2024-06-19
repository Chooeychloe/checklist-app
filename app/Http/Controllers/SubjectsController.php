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
}
