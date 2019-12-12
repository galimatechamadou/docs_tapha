<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    public function show(){ 
        $type=\App\Type_bien::pluck('nom','id');
        return view('annonces.create',compact('type'));
    }
    public function depot(Request $request){
        $data= $request->validate([
            'title'=>'required|min:2|max:50',
            'prix'=>'required|max:7|numeric',
            'description'=>'min:3|max:100000',
            'type_bien_id'=>'required',
        ]);
        $annonce = new \App\Annonce_bien();
        $annonce->title = $request->input('title');
        $annonce->ville = $request->input('ville');
        $annonce->quartier = $request->input('quartier');
        $annonce->prix = $request->input('price');
        $annonce->mettre_2 = $request->input('surface');
        $annonce->description = $request->input('description');
        $annonce->type_bien_id = $request->input('type_bien');
        $annonce->save();
        return redirect('/annonces/index')->with(['success'=>"Annonce bien enregistré"]);
    
    }
     
}

