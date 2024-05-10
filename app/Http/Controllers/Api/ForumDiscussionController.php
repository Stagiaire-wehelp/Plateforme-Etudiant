<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Api;

use App\Models\ForumDiscussion;

use App\Http\Controllers\Controller;
use App\Models\Universitaire;

class ForumDiscussionController extends Controller
{
    public function index(){

        $forum=ForumDiscussion::all();
        return response()->json($forum);
    }

    public function store(){

        $formfield = request()->validate([
            "titre" => "required|string",
            "contenu" => "required|string",
            'user_id' => 'required|exists:users,id',
        ]);

         $forum=ForumDiscussion::create($formfield);
         return response()->json($forum);
    }

        public function update(ForumDiscussion $forum){

            $formfield = request()->validate([
                "titre" => "required|string",
                "contenu" => "required|string",
                'user_id' => 'required|exists:users,id',
            ]);

            $forum->update($formfield);
            return response()->json($forum);
        }


        public function delete(ForumDiscussion $forum){

            $forum->delete();

            return response()->json(['message' => 'Forum supprimée avec succès']);
        }



        public function allforumcommantaire(ForumDiscussion $forum){

            $forum->commentaires;
            return response()->json($forum);

        }
        

        public function allforumUniversity(Universitaire $universitaire){//tous les forum est les commentaire de chaque forum

            $all_forum_universitaire=$universitaire->forum_discussions()->with('commentaires')->get();

            return response()->json($all_forum_universitaire);

        }


}
