<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class autenticacionController extends Controller
{
    public function registrarse (Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        $usuario = User::created(
            [
                'name'=>$request->name,
                'email'=>$request->email
            ],201);
        return response()->json([
            'user'=>$usuario
        ],201);
    }
}
