<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
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
            'role'=>'string',
        ]);
        $formfield['password']=Hash::make($request->password);
        $user = User::create($formfield);


        return response()->json([
            'user' => $user,
            'message' => 'User registered successfully',
        ], 201);
    }
}
