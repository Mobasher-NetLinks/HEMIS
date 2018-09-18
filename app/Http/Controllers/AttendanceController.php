<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\University;
use App\Models\Department;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {        
         $this->middleware('permission:view-student', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        return view('attendance.index', [
            'title' => trans('general.attendance'),
            'description' => trans('general.create_attendance'),
            'universities' => University::pluck('name', 'id')
        ]);
    }

    public function show(Request $request)
    {
        $department = Department::find($request->department);

        $pdf = PDF::loadView('attendance.show', compact('department', 'request'), [], [
            'format' => 'A4-L'
          ]);

        return $pdf->stream('attendance.pdf');
    }
}
