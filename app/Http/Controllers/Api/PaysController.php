<?php
namespace App\Http\Controllers\Api;

use App\Models\Pays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ville;

class PaysController extends Controller
{
    public function index(){
      $pays=Pays::all();
      return response()->json($pays);
    }



    public function show(Pays $pays){
       return response()->json($pays);
    }



    public function store(Request $request){

        $formfield=$request->validate([
            'titre'=>'required|string|unique:pays'
        ]);

        $pays=Pays::create($formfield);
         return response()->json($pays);
    }



    public function update(Pays $pays){

        $formfield=request()->validate([
            'titre'=>'required|string|unique:pays'
        ]);

        $pays->update($formfield);
         return response()->json($pays);

    }




    public function delete(Pays $pays){

        $pays->delete();
        return response()->json(['message' => 'pays supprimée avec succès']);
    }





    public function allPaysVilles(Pays $pays){

        $all_villes_pays=$pays->villes;
       return response()->json($all_villes_pays);
    }

    
}
