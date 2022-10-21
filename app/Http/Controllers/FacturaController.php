<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Clientes;
use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Inventario;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $factura = new Factura();
        $all_factura = $factura->all();

        foreach($all_factura as $item)
        {
            $detalle_factura = DetalleFactura::where('fac_dfac', '=', $item->cod_fac)->first();
            $item->detalle = isset($detalle_factura) ? $detalle_factura : null;
        }

        return response()->json(['facturas' => $all_factura], 200);
    }

    public function getFacturaByCode($codigo)
    {
        $factura = Factura::where('cod_fac', '=', $codigo)->first();

        if (isset($factura)) {
            $detalle_factura = DetalleFactura::where('fac_dfac', '=', $factura->cod_fac)->first();
            $factura->detalle = isset($detalle_factura) ? $detalle_factura : null;

            return response()->json(['facturas' => $factura], 404);
        }

        return response()->json(['mensaje' => 'Factura no encontrada'], 404);
    }

    public function postFactura(Request $request)
    {
        $factura = new Factura();

        $fec_fac = date('Y-m-d');

        $factura->fec_fac = $fec_fac;

        $cli_fac = $request->cli_fac;
        $cliente = Clientes::where('cod_cli', '=', $cli_fac)->first();

        if (!isset($cliente)) {
            return response()->json(['mensaje' => "Cliente {$cli_fac} no encontrado"], 404);
        }

        $factura->cli_fac = $cliente->ced_cli;
        $factura->tip_fac = $request->tip_fac;

        $tie_cre = 0;
        $fec_ven = ((int)date('Y') + 2) . '-' . date('m-d');
        $ord_fac = 0;
        $sta_fac = 'Pagado';
        $anu_fac = '0';
        $fec_anu = date('Y-m-d');

        $factura->tie_cre = $tie_cre;
        $factura->fec_ven = $fec_ven;
        $factura->ord_fac = $ord_fac;
        $factura->sta_fac = $sta_fac;
        $factura->anu_fac = $anu_fac;
        $factura->fec_anu = $fec_anu;

        $factura->sub_tot = $request->sub_tot;
        $factura->bas_fac = $request->bas_fac;
        $factura->por_des = $request->por_des;
        $factura->des_fac = $request->des_fac;
        $factura->val_iva = $request->val_iva;
        $factura->iva_fac = $request->iva_fac;
        $factura->tot_fac = $request->tot_fac;
        $factura->obs_fact = $request->obs_fact;

        $pre_fact = 0;
        $mod_fac = '';
        $num_con = 0;
        $web_fac = 0;
        $imp_fac = 1;
        $fac_fis = '';
        $usu_fac = '';
        $dol_fac = 0;

        $factura->pre_fact = $pre_fact;
        $factura->mod_fac = $mod_fac;
        $factura->num_con = $num_con;
        $factura->web_fac = $web_fac;
        $factura->imp_fac = $imp_fac;
        $factura->fac_fis = $fac_fis;
        $factura->usu_fac = $usu_fac;
        $factura->dol_fac = $dol_fac;

        $articulos = $request->articulos;

        if (!is_array($articulos)) {
            return response()->json(['mensaje' => 'productos debe ser una lista'], 400);
        }

        $detalles = [];

        foreach($articulos as $articulo) {
            $id_articulo = $articulo['art_dfac'];
            $articulo_encontrado = Articulos::where('cod_art', '=', $id_articulo)->first();

            if (!isset($articulo_encontrado)) {
                return response()->json(['mensaje' => "Producto {$id_articulo} no encontrado"], 404);
            };

            $cantidad = $articulo['can_dart'];

            $Inventario_articulo = Inventario::where('art_inv', '=', $id_articulo)->first();

            if (isset($Inventario_articulo)) {
                if ($cantidad > $Inventario_articulo->can_inv) {
                    return response()->json(['mensaje' => 'El inventario de este producto llego a su minimo'], 400);
                }

                $Inventario_articulo->can_inv = $Inventario_articulo->can_inv - $cantidad;

                Inventario::where('art_inv', '=', $id_articulo)->update(['can_inv' => $Inventario_articulo->can_inv]);
            }

            $ord_dfac = 0;
            $ped_dfac = '';

            $detalle_factura = new DetalleFactura();

            $detalle_factura->art_dfac = $id_articulo;
            $detalle_factura->can_dart = $Inventario_articulo->can_inv ?? $cantidad;
            $detalle_factura->pre_dfac = $articulo_encontrado->pvp_art;
            $detalle_factura->ord_dfac = $ord_dfac;
            $detalle_factura->ped_dfac = $ped_dfac;

            $detalles[] = $detalle_factura;
        }

        $factura->save();

        foreach($detalles as $detalle) {
            $detalle->fac_dfac = $factura->id;
            $detalle->save();
        }

        return response()->json(['factura' => $factura->id], 200);
    }
}
