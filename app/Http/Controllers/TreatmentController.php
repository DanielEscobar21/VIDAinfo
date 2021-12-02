<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Product;
use App\Models\Treatment;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTreatment;
use PDF;

class TreatmentController extends Controller
{
    public function create(Patient $patient, Visit $visit){
        $products = Product::all();
        return view('patients.visits.treatments.create', compact('patient','visit','products'));
    }

    public function store(StoreTreatment $request, Patient $patient, $id){
        $visit=Visit::find($id);
        $treatment = new Treatment();
        $treatment->notes_treatment = $request->notes_treatment;
        $treatment->medicament1_treatment = $request->medicament1_treatment;
        $treatment->dose1_treatment = $request->dose1_treatment;
        $treatment->medicament2_treatment = $request->medicament2_treatment;
        $treatment->dose2_treatment = $request->dose2_treatment;
        $treatment->medicament3_treatment = $request->medicament3_treatment;
        $treatment->dose3_treatment = $request->dose3_treatment;
        $treatment->medicament4_treatment = $request->medicament4_treatment;
        $treatment->dose4_treatment = $request->dose4_treatment;
        $treatment->medicament5_treatment = $request->medicament5_treatment;
        $treatment->dose5_treatment = $request->dose5_treatment;
        $treatment->visit_id = $visit->id;
        $treatment->save();
        return redirect()->route('patients.visits.treatments.show', compact('patient','visit','treatment'));
    }

    public function show(Patient $patient, Visit $visit, Treatment $treatment){
        return view('patients.visits.treatments.show', compact('patient','visit','treatment'));
    }

    public function print(Patient $patient, Visit $visit, Treatment $treatment){
        $pdf= PDF::loadView('patients.visits.treatments.print.print', compact('patient','visit','treatment'));
        $pdf->setPaper([0, 0, 612, 396]);
        return $pdf->stream();
    }
}
