<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
    	$data=['suraj'];
    	$pdf = PDF::loadView('invoice', $data);
        return $pdf->download('invoice.pdf');
    	
    }
}
