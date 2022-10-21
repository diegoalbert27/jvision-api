<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\SanctumAuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() {
    return response()->json(['mensaje' => 'api trabajando']);
});

Route::post('/registro', [SanctumAuthController::class, 'registro']);
Route::post('/login', [SanctumAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Users Routes
    Route::post('/perfil', [SanctumAuthController::class, 'perfil']);
    Route::post('/logout', [SanctumAuthController::class, 'logout']);

    // Rutas de Articulos
    Route::get('/articulos', [ArticulosController::class, 'index']);
    Route::get('/articulos/{codigo}', [ArticulosController::class, 'getByCode']);

    // Rutas Inventario
    Route::get('/inventario', [InventarioController::class, 'index']);
    Route::get('/inventario/{product}', [InventarioController::class, 'getByProduct']);

    // Rutas Ventas
    Route::get('/factura', [FacturaController::class, 'index']);
    Route::get('/factura/{codigo}', [FacturaController::class, 'getFacturaByCode']);
    Route::post('/factura/new', [FacturaController::class, 'postFactura']);

    // Rutas Clientes
    Route::get('/clientes', [ClientesController::class, 'index']);
    Route::get('/clientes/{id}', [ClientesController::class, 'getById']);
});
