<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAilment;
use Illuminate\Http\Request;
use App\Models\Ailment;
use App\Models\Product;

class AilmentController extends Controller
{
    public function index(){
        $ailments = Ailment::all(); 
        return view('ailments.index', compact('ailments'));
    }

    public function create(){
        return view('ailments.create');
    }

    public function store(StoreAilment $request){
        $ailment = new Ailment();
        $ailment->name_ailment = $request->name_ailment;
        $ailment->save();
        return redirect()->route('ailments.index');
    }

    public function show(Ailment $ailment){    
        $products = Product::all()->where('ailment_id', $ailment->id);
        return view('ailments.show', compact('ailment'));
    }

    public function edit(Ailment $ailment){
        return view('ailments.edit', compact('ailment'));
    }

    public function update(Storeailment $request, Ailment $ailment){
        $ailment->name_ailment = $request->name_ailment;
        $ailment->save();
        return redirect()->route('ailments.show', $ailment);
    }

    public function destroy(Ailment $ailment){
        $ailment->delete();
        return redirect()->route('ailments.index');
    }
}
