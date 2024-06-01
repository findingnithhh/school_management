<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $students = Student::all();
        $students = Student::paginate(10);
        return view('student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:1',
            'gender' => 'required',
            'class' => 'required',
        ]); 

        $student = new Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->class = $request->class;
        $student->save();

        Session::flash('student_created', 'New student has been insterted successfully!');
        return redirect('/student/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        if($student != null)
        {
            return view('student.edit')->with('student', $student);
        }
        Session::flash('student_notfound', 'Sorry student with id '.$id. ' is not found in our database!');
        return redirect('/student');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:2',
            'gender' => 'required',
            'class' => 'required',
        ]);
        
        $student = Student::find($id);
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->class = $student->class;
        $student->save();
        Session::flash('student_updated', 'Student '.$request->name. ' has been updated succesfully!');
        return redirect('/student/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        if($student != null)
        {
            $student->delete();
            Session::flash('student_deleted', 'Student has been deleted successfully!');
            return redirect('/student');
        }
        else 
        {
            Session::flash('student_deleted', 'Oop sorry this id '.$id.' is not have is our database!' );
            return redirect('/student');
        }
    }
    // search
    public function search(Request $request)
    {
        $get_name = $request->search_name;
        $students = Student::where('name', 'LIKE', '%'.$get_name.'%')->get();
        return view('/student/search', compact('students'));
    }
}