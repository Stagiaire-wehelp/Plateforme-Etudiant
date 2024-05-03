<?php

namespace App\Http\Controllers\Api;

use App\Models\Villes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ville;

class VilleController extends Controller
{
    public function index(){
      $villes=Ville::all();
      return response()->json($villes);
      }
      public function show(Ville $ville){
       return response()->json($ville);
      }


      public function store(){

        $formfield = request()->validate([
            "titre"=>'required|string',
            'pays_id'=>'required|exists:pays,id'
        ]);
        $ville=Ville::create($formfield);
        return response()->json($ville);

      }
      public function update(Ville $ville){

        $formfield = request()->validate([
            "titre"=>'required|string',
            'pays_id'=>'required|exists:pays,id'
        ]);

        $ville->update($formfield);
        return response()->json($ville);

      }
      public function delete(Ville $ville){
         $ville->delete();
         return response()->json($ville);
      }
}
