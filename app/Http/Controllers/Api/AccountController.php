<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        $account=User::all();
        return response()->json($account);
    }

    public function show(User $account){
       return response()->json($account);
    }



    public function Store(Request $request)
    {
        $formfield=$request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel'=>'string',
            'nom_Organization'=>'string',
            'level'=>'string',
            'Date_Graduation'=>'string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
             'ville_id'=>'exists:villes,id',
             'pays_id'=>'exists:pays,id',
            'role'=>'string',
        ]);
        $formfield['password']=Hash::make($request->password);
        $user = User::create($formfield);

        $token = $user->createToken('UserAccessToken')->accessToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'message' => 'User registered successfully',
        ], 201);
    }



    public function update(User $account){


        $formfield=request()->validate([
            'nom' => 'string|max:255',
            'prenom' => 'string|max:255',
            'tel'=>'string',
            'nom_Organization'=>'string',
            'level'=>'string',
            'ville_id'=>'exists:villes,id',
            'pays_id'=>'exists:pays,id',
            'Date_Graduation'=>'string',
            'email' => 'string|email|max:255',
            'password' => 'string|min:8',
            'role'=>'string',
        ]);

        if(isset( $formfield['password']))
        $formfield['password']=Hash::make(request()->password);

        $account->update($formfield);

        return response()->json([
            'user' => $account
        ], 201);

    }

    public function delete(User $account){
        $account->delete();
        return response()->json(['message' => 'Compte supprimé avec succès']);
    }


    public function allUniversitaire(User $account){

        $all_universitaire_user=$account->universitaires;
        return response()->json($all_universitaire_user);

    }
}
