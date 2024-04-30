<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidatureController extends Controller
{
    public function index(){

        $candidatures=Candidature::all();
        return response()->json($candidatures);

    }



    public function show(Candidature $candidature){
        return response()->json($candidature);
    }



    public function store(){

        $formfield = request()->validate([
            "choix" => "required|string",
            "diplome" => "required|string",
            "lettre_de_motivation" => "required",
            "releves_de_notes" => "required|string",
            'user_id' => 'required|exists:users,id',
        ]);

         $candidature=Candidature::create($formfield);
         return response()->json($candidature);
    }




    public function update(Candidature $candidature){

        $formfield = request()->validate([
            "choix" => "string",
            "diplome" => "string",
            "lettre_de_motivation" => "",
            "releves_de_notes" => "string",
            'user_id' => 'exists:users,id',
        ]);

        $candidature->update($formfield);

         return response()->json([$candidature]);
    }



    public function delete(Candidature $candidature){

        $candidature->delete();
        return response()->json(['message' => 'Annonce supprimée avec succès']);
    }


}
