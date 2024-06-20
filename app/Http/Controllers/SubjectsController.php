<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;


class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subjects::orderBy('id', 'desc')->get();
        $total = Subjects::count();
        return view('admin.subjects.home', compact(['subjects', 'total']));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
             'subject_code' => 'required|string|max:255',
        'subject_name' => 'required|string|max:255',
        'credit_unit_lec' => 'nullable|integer',
        'credit_unit_lab' => 'nullable|integer',
        'contact_hrs_lec' => 'nullable|integer',
        'contact_hrs_lab' => 'nullable|integer',
        'pre_requisite' => 'nullable|string|max:255',
        'semester_yr_taken' => 'nullable|string|max:255',
        'grade' => 'required|string|max:2', // Assuming grade is a string like 'A', 'B', etc.
        'instructor' => 'required|string|max:255',

        ]);
        $data = Subjects::create($validation);
        if ($data) {
            session()->flash('success', 'Subject Added Succesfully');
            return redirect(route('admin/subjects'));
        } else {
            session()->flash('error', 'Some problem occur');
            return redirect(route('admin.subjects/create'));
        }
    }
    public function delete($id)
    {
        $subjects = Subjects::findOrFail($id)->delete();
        if ($subjects) {
            session()->flash('success', 'Subject Deleted Succesfully');
            return redirect(route('admin/subjects'));
        } else {
            session()->flash('error', 'Product not deleted');
            return redirect(route('admin.subjects'));
        }
    }
    public function edit($id)
    {
        $subjects = Subjects::findOrFail($id);
        return view('admin.subjects.update', compact('subjects'));
    }

    public function update(Request $request, $id)
    {
        $subjects = Subjects::findOrFail($id);
        $subject_code = $request->subject_code;
        $subject_name = $request->subject_name;
        $credit_unit_lec = $request->credit_unit_lec;
        $credit_unit_lab = $request->credit_unit_lab;
        $contact_hrs_lec = $request->contact_hrs_lec;
        $contact_hrs_lab = $request->contact_hrs_lab;
        $pre_requisite = $request->pre_requisite;
        $semester_yr_taken = $request->semester_yr_taken;
        $grade = $request->grade;
        $instructor = $request->instructor;


        $subjects->subject_code = $subject_code;
        $subjects->subject_name = $subject_name;
        $subjects->credit_unit_lec =$credit_unit_lec;
        $subjects->credit_unit_lab = $credit_unit_lab;
        $subjects->contact_hrs_lec = $contact_hrs_lec;
        $subjects->contact_hrs_lab =$contact_hrs_lab;
        $subjects->pre_requisite = $pre_requisite;
        $subjects->semester_yr_taken = $semester_yr_taken;
        $subjects->grade = $grade;
        $subjects->instructor = $instructor;

        $data = $subjects->save();
        if ($data) {
            session()->flash('success', 'Subject Updated Succesfully');
            return redirect(route('admin/subjects'));
        } else {
            session()->flash('error', 'Some problem occur');
            return redirect(route('admin.subjects/update'));
        }
    }
}
