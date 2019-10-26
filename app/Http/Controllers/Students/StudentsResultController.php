<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Student;
use App\Models\Department;

class StudentsResultController extends Controller
{
    
    public function index(){

        return view ('students.results.index', [
            'title' => trans('general.students_result'),
            'description' => trans('general.create_students_result'),
            'universities' => University::pluck('name', 'id'),
            'department' => old('department') != '' ? Department::where('id', old('department'))->pluck('name', 'id') : [],
               
        ]);
    }

    public function create(Request $request){

        $department = Department::find($request->department);
        // dd($students[0]->courses()->where('semester',$request->semester)->where('year',$request->year)->get());
        $students = $department->group->students;
        $courseSubjects = $students[0]->courses->where('semester', $request->semester)->where('year', $request->year);
        $subjectsCount = $courseSubjects->count();
        return view ('students.results.print', [
            'title' => trans('general.students_result'),
            'description' => trans('general.create_students_result'),
            'university' => University::find($request->university),
            'department' => Department::find($request->department),
            'semester' => $request->semester,
            'year' => $request->year,
            'students' => $students,
            'subjectsCount' => $subjectsCount,
            'courseSubjects' => $courseSubjects,
        ]);


        // $university = University::find($request->university);
        // $department = Department::find($request->department);
        // $semester = $request->semester;
        // $year = $request->year;
        // $students = $department->group->students;
        // $courseSubjects = $students[0]->courses->where('semester', $request->semester)->where('year', $request->year);
        // $subjectsCount = $courseSubjects->count();

        
        // $pdf = \PDF::loadView('students.results.print', compact('university', 'department','semester','year','students','subjectsCount','courseSubjects'), [], [            
        //     'format' => 'A4-L',
        //     'direction' => 'rlt'
        // ]);

        // return $pdf->stream('document.pdf');

        // // return $pdf->stream($university->name. ''. $department->name . '_'.$semester.'.pdf');
        
    }

    
}
