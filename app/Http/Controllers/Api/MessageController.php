<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{


    public function show(User $user){


        $user_auth_id = Auth::guard('api')->user()->id;


        $messages = Message::where(function ($query) use ($user_auth_id, $user) {
            $query->where('id_emetteur', $user_auth_id)
                  ->orWhere('id_recepteur', $user_auth_id);
        })
        ->where(function ($query) use ($user_auth_id, $user) {
            $query->where('id_emetteur', $user->id)
                  ->orWhere('id_recepteur', $user->id);
        })
        ->get();



        return response()->json($messages);

    }


    public function store(User $user,Request $request){

        $user_auth_id = Auth::guard('api')->user()->id;

        $message = new Message();
        $message->contenu = $request->contenu;
        $message->id_emetteur = $user_auth_id;
        $message->id_recepteur = $user->id;
        $message->save();

    return response()->json(['message' => 'Message enregistré avec succès'], 200);
    }
}
