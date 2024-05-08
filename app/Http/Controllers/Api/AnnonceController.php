<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnonceController extends Controller
{
    public function index(){
        $annonces=Annonce::all();
        return response()->json($annonces);
    }

    public function show(Annonce $annonce){
        return response()->json($annonce);
    }

    public function store(){

        $formfield = request()->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
         $annonce=Annonce::create($formfield);
         return response()->json([$annonce]);
    }

    public function update(Annonce $annonce){

        $formfield = request()->validate([
            'titre' => 'string|max:255',
            'description' => 'string',
            'image' => '',
            'user_id' => 'exists:users,id',
        ]);

        $annonce->update($formfield);

         return response()->json([$annonce]);
    }

    public function delete(Annonce $annonce){
        
        $annonce->delete();
        return response()->json(['message' => 'Annonce supprimée avec succès']);
    }
}
