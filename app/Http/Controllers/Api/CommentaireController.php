<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Api;

use App\Models\Commentaire;

use App\Http\Controllers\Controller;

class CommentaireController extends Controller
{


    public function store(){
        $formfield = request()->validate([
            "contenu" => "required|string",
            'user_id' => 'required|exists:users,id',
            'forum_discussion_id' => 'required|exists:forum_discussions,id',
        ]);

         $commentaire=Commentaire::create($formfield);
         return response()->json($commentaire);
    }


    public function update(Commentaire $commentaire){

        $formfield = request()->validate([
            "contenu" => "required|string",
        ]);

         $commentaire->update($formfield);
         return response()->json($commentaire);
    }

    public function delete(Commentaire $commentaire){

        $commentaire->delete();

        return response()->json(['message' => 'Commentaire supprimée avec succès']);
    }

}
