<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(3);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:25|min:4',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students|max:12|min:9',
        ];
        $this->validate($request, $rules);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        // return response()->json($student);
        $student->save();
        Session()->flash('success', 'You successfully added new student.');
        return redirect('/student');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::findorFail($id);
        // return response()->json($student);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:25|min:4',
            'email' => 'required',
            'phone' => 'required|max:12|min:9',
        ];
        $this->validate($request, $rules);

        $student = Student::findorFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        Session()->flash('success', 'Student updated successfully.');
        return redirect('/student');
    }

    public function destroy($id)
    {
        $student = Student::findorFail($id);
        $student->delete();
        Session()->flash('success', 'Student deleted successfully.');
        return redirect('/student');
    }
}
