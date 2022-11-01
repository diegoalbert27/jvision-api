<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = new Clientes();
        $all_clientes = $clientes->all();

        return response()->json($all_clientes, 200);
    }

    public function getById($id)
    {
        $cliente = Clientes::where('cod_cli', '=', $id)->first();

        if (isset($cliente)) {
            return response()->json($cliente, 200);
        }

        return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
    }
}
