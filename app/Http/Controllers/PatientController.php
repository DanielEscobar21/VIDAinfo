<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests\StorePatient;
use App\Models\Visit;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::all(); 
        return view('patients.index', compact('patients'));
    }

    public function create(){
        return view('patients.create');
    }

    public function store(StorePatient $request){

        $patient = new Patient();
        $patient->name_patient = $request->name_patient;
        $patient->lastname_patient = $request->lastname_patient;
        $patient->email_patient = $request->email_patient;
        $patient->phone_patient = $request->phone_patient;
        $patient->age_patient = $request->age_patient;
        $patient->gender_patient = $request->gender_patient;
        $patient->save();
        return redirect()->route('patients.show', $patient);
    }

    public function show(Patient $patient){
        $visits = Visit::all()->where('patient_id',$patient->id);    
        return view('patients.show', compact('patient','visits'));
    }

    public function edit(Patient $patient){
        return view('patients.edit', compact('patient'));
    }

    public function update(StorePatient $request, Patient $patient){
        $patient->name_patient = $request->name_patient;
        $patient->lastname_patient = $request->lastname_patient;
        $patient->email_patient = $request->email_patient;
        $patient->phone_patient = $request->phone_patient;
        $patient->age_patient = $request->age_patient;
        $patient->gender_patient = $request->gender_patient;
        $patient->save();
        return redirect()->route('patients.show', $patient);
    }

    public function destroy(Patient $patient){
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
