<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Tipo;

class ArticulosController extends Controller
{
    public function index()
    {
        $articulos = new Articulos();
        $all_articulos = $articulos->all();

        foreach($all_articulos as $articulo)
        {
            $tipo_articulo = Tipo::where('cod_tip', '=', $articulo->tip_art)->first();
            $articulo->tip_art = isset($tipo_articulo) ? $tipo_articulo : '';
        }

        return response()->json($all_articulos, 200);
    }

    public function getByCode($codigo) {
        $articulo = Articulos::where('cod_art', '=', $codigo)->first();

        if (isset($articulo)) {
            $tipo_articulo = Tipo::where('cod_tip', '=', $articulo->tip_art)->first();
            $articulo->tip_art = isset($tipo_articulo) ? $tipo_articulo : '';
            return response()->json($articulo, 200);
        }

        return response()->json(['mensaje' => 'Articulo no encontrado'], 404);
    }
}
