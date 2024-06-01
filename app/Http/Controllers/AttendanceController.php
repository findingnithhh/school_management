<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $attendances = Attendance::all();
        $attendances = Attendance::paginate(10);
        return view('attendance.index')->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:2',
            'attendance' => 'required',
            'attdendance_date' => 'required',
        ]);
        $attendance = new Attendance;
        $attendance->name = $request->name;
        $attendance->attendance = $request->attendance;
        $attendance->attdendance_date = $request->attdendance_date;
        $attendance->save();

        Session::flash('attendance_created', 'New attendate has been added successfully!');
        return redirect('/attendance/create');
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
        $attendance = Attendance::find($id);
        if($attendance != null)
        {
            return view('attendance.edit')->with('attendance', $attendance);
        }
        Session::flash('attendance_updated', 'New attendance has been updated successfully!');
        return redirect('/attendance');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:2',
            'attendance' => 'required',
            'attdendance_date' => 'required',
        ]);

        $attendance = Attendance::find($id);
        $attendance->name = $request->name;
        $attendance->attendance = $request->attendance;
        $attendance->attdendance_date = $request->attdendance_date;
        $attendance->save();

        Session::flash('attendance_updated', 'Attendance has been updated successfully!');
        return redirect('/attendance/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $attendance = Attendance::find($id);
        if($attendance != null)
        {
            $attendance->delete();
            Session::flash('attendance_deleted', 'Attendance has been deleted successfully!');
            return redirect('/attendace');
        }
        else
        {
            Session::flash('attendance_deleted', 'Oop sorry this id '.$id. ' is not have in our database!');
            return redirect('/attendance');
        }
    }
    public function search(Request $request)
    {
        $get_name = $request->search_name;
        $attendances = Attendance::where('attendance', 'LIKE', '%' . $get_name . '%')->get();
        return view('/attendance/search', compact('attendances'));
    }
}
