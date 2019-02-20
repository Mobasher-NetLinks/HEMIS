<?php

namespace App\Http\Controllers\Students;

use App\Models\Dropout;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\DropoutsDataTable;

class DropoutsController extends Controller
{
    public function __construct()
    {        
        $this->middleware('permission:view-dropout', ['only' => ['index', 'show']]);        
        $this->middleware('permission:create-dropout', ['only' => ['create','store']]);
        $this->middleware('permission:delete-dropout', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DropoutsDataTable $dataTable)
    {        
        return $dataTable->render('dropouts.index', [
            'title' => trans('general.dropouts'),
            'description' => trans('general.dropouts_list')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dropouts.create', [
            'title' => trans('general.dropouts'),
            'description' => trans('general.new_dropouts'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([            
            'student_id' => 'required',
        ]);

        \DB::transaction(function () use ($request){
            
            $student = Student::find($request->student_id);

            $dropout = Dropout::create([
                'student_id' => $request->student_id,
                'year' => $request->year,
                'semister' => $request->semister,
                'note' => $request->note,
                'university_id' => $student->university_id
            ]);

            // will update after admin approved
            // $student->update([
            //     'status_id' => 3,
            // ]);

             $dropout->download($student , 'درخواست-منفکی', $request, $dropout);
            
        });

        return redirect(route('dropouts.index'));
    }

    public function edit($dropout)
    {
 
         if( $dropout->approved == false )
         {
             $dropout->update([
                 'approved' => true
             ]);
         }
 
         return redirect(route('dropouts.index'));
 
    }
    public function update()
    {
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dropout)
    {

        \DB::transaction(function () use ($dropout){
            $dropout->student->update([
                'status_id' => 1
            ]);
            $dropout->delete();
        });

        return redirect(route('dropouts.index'));
    }
}