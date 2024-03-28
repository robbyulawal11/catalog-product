<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('school')->get();

        return view('pages.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();

        return view('pages.student.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'address'=> 'required',
            'school' => 'required'
        ]);

        Student::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'school_id' => $request->school,
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $schools = School::all();

        return view('pages.student.edit', compact('student', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {

        $request->validate([
            'name'=> 'required',
            'address'=> 'required',
            'school' => 'required',
        ]);
        $student->update([
            'name'=> $request->name,
            'address'=> $request->address,
            'school_id' => $request->school
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index');
    }
}
