<?php

namespace App\Http\Controllers\Students;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentCardController extends Controller
{
    public function index($student)
    {
        $pdf = PDF::loadView('students.card', compact('student'), [], [
            'format' => [86, 54]
          ]);

        return $pdf->stream($student->form_no.'.pdf');
    }
}
