<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Visit;
use App\Http\Requests\StoreVisit;

class VisitController extends Controller
{
    public function create(Patient $patient){
        return view('patients.visits.create', compact('patient'));
    }

    public function store($id,StoreVisit $request){
        $patient=Patient::find($id);
        $visit = new Visit();
        $visit->visit_dateTime= $request->visit_dateTime;
        $visit->visit_observations = $request->visit_observations;
        $visit->visit_state = $request->visit_state;
        $visit->patient_id = $id;
        $visit->save();	
        return redirect()->route('patients.visits.show', compact('patient','visit'));
    }

    public function show(Patient $patient, Visit $visit){
        $treatments=Treatment::all()->where('visit_id',$visit->id);
        return view('patients.visits.show', compact('patient','visit','treatments'));
    }
}
