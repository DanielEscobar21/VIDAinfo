<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LetterheadController extends Controller
{
    public function index(){
        return view('documents.letterhead.index');
    }

    public function print(Request $request){
        $pdf= PDF::loadView('documents.letterhead.print',compact('request'));
        $pdf->setPaper([0, 0, 612.2835, 790.8661]);
        return $pdf->stream();
    }
}
