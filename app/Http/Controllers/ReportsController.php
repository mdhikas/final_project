<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportsController extends Controller
{
    public function enviro()
    {
        $pdf = PDF::loadView('admin.report')->setPaper('a4', 'landscape');
        // return view('admin.report');
        return $pdf->stream('report.pdf');
    }
}
