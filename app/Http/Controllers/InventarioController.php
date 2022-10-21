<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = new Inventario();
        $all_inventario = $inventario->all();

        foreach ($all_inventario as $product_inventario)
        {
            $almacen = Almacen::where('cod_alm', '=', $product_inventario->alm_inv)->first();
            $product_inventario->alm_inv = isset($almacen) ? $almacen : '';
        }

        return response()->json(['inventario' => $all_inventario], 200);
    }

    public function getByProduct($product)
    {
        $inventario = Inventario::where('art_inv', '=', $product)->first();

        if (isset($inventario)) {
            $almacen = Almacen::where('cod_alm', '=', $inventario->alm_inv)->first();
            $inventario->alm_inv = isset($almacen) ? $almacen : '';

            return response()->json(['product_inventario' => $inventario], 200);
        }

        return response()->json(['mensaje' => 'Producto no encontrado'], 404);
    }
}
