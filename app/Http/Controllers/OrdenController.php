<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    public function index(Request $request)
    {
        $orden = new Orden();

        if ($request->query('fechaInicio') === null) {
            $ordenes = $orden->all();

            foreach ($ordenes as $row_orden) {
                $cliente = Clientes::where('ced_cli', '=', $row_orden->ced_ord)->first();

                if (isset($cliente)) {
                    $row_orden->ced_ord = $cliente;
                }
            }

            return response()->json($ordenes, 200);
        }

        $fecha_inicio = $request->query('fechaInicio') ?? date('Y-m-d');
        $fecha_final = $request->query('fechaFinal') ?? date('Y-m-d');

        $ordenes = DB::table('tab_orden')
            ->where('est_ord2', '=', 0)
            ->where('est_ord', '<>', 3)
            ->whereBetween('fec_ord', [$fecha_inicio, $fecha_final])
            ->orderByDesc('fec_ord')->get();

        foreach ($ordenes as $row_orden) {
            $cliente = Clientes::where('ced_cli', '=', $row_orden->ced_ord)->first();

            if (isset($cliente)) {
                $row_orden->ced_ord = $cliente;
            }
        }

        return response()->json($ordenes, 200);
    }
}
