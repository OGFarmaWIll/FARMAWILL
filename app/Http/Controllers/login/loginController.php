<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class loginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'c_login' => 'required|string',
            'c_pass'  => 'required|string'
        ]);
    
        $usuario = Usuario::where('c_login', $request->c_login)->first();
    
        if ($usuario && $usuario->c_pass === $request->c_pass) {
            Auth::login($usuario);
    
            return response()->json([
                'message' => 'Login correcto',
                'user'    => $usuario
            ], 200);
        }
    
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }
    



}
