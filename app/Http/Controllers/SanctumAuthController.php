<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class SanctumAuthController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:acceso',
            'nombre' => 'required',
            'apellido' => 'required',
            'clave' => 'required',
            'usuario' => 'required|unique:acceso',
            'nivel' => 'required',
        ]);

        $user = new User();

        $user->cedula = $request->cedula;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->clave = $request->clave;
        $user->usuario = $request->usuario;
        $user->nivel = $request->nivel;
        $user->avatar = '1424468933_27406_jc.jpg';
        $user->servidor = '';

        $user->save();

        return response()->json(['mensaje' => 'Usuario Registrado Correctamente'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'clave' => 'required',
            'usuario' => 'required',
        ]);

        $user = User::where('usuario', '=', $request->usuario)->first();

        if (isset($user)) {
            if ($request->clave === $user->clave) {
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json(['mensaje' => 'Acceso Permitido', 'access_token' => $token], 200);
            }

            return response()->json(['mensaje' => 'Usuario o Clave Invalidos'], 401);
        }

        return response()->json(['mensaje' => 'Usuario o Clave Invalidos'], 401);
    }

    public function perfil()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['mensaje' => 'logout'], 200);
    }
}
