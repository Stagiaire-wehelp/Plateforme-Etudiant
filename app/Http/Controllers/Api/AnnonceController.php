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

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonce', 'public');
            $formFields['image'] = $imagePath;
        }
        $annonce = Annonce::create($formFields);
        return response()->json($annonce);
    }


    public function update(Annonce $annonce,Request $request){

        $formfield =$request->validate([
            'titre' => 'string|max:255',
            'description' => 'string',
            'image' => 'nullable|image',
            'user_id' => 'exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonce', 'public');
            $formfield['image'] = $imagePath;
        }

        $annonce->update($formfield);

         return response()->json([$annonce]);
    }

    public function delete(Annonce $annonce){

        $annonce->delete();
        return response()->json(['message' => 'Annonce supprimée avec succès']);
    }
}
