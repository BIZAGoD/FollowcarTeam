<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasInventarioController; // Ensure this class exists in the specified namespace
use App\Http\Controllers\CategoriasServicioController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\DetallesCotizacionesController;
use App\Http\Controllers\DiagnosticosController;
use App\Http\Controllers\DocumentosVehiculoController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\MecanicosController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\MovimientosInventarioController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TiposServicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VehiculosController;

Route::prefix('categoriasInventario')->group(function () {
    Route::get('/', [CategoriasInventarioController::class, 'index']);
    Route::post('/store', [CategoriasInventarioController::class, 'store']);
    Route::get('/show/{id}', [CategoriasInventarioController::class, 'show']);
    Route::put('/update/{id}', [CategoriasInventarioController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoriasInventarioController::class, 'destroy']);
});

Route::prefix('categoriasServicio')->group(function () {
    Route::get('/', [CategoriasServicioController::class, 'index']);
    Route::post('/store', [CategoriasServicioController::class, 'store']);
    Route::get('/show/{id}', [CategoriasServicioController::class, 'show']);
    Route::put('/update/{id}', [CategoriasServicioController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoriasServicioController::class, 'destroy']);
});

Route::prefix('citas')->group(function () {
    Route::get('/', [CitasController::class, 'index']);
    Route::post('/store', [CitasController::class, 'store']);
    Route::get('/show/{id}', [CitasController::class, 'show']);
    Route::put('/update/{id}', [CitasController::class, 'update']);
    Route::delete('/destroy/{id}', [CitasController::class, 'destroy']);
});

Route::prefix('cotizaciones')->group(function () {
    Route::get('/', [CotizacionesController::class, 'index']);
    Route::post('/store', [CotizacionesController::class, 'store']);
    Route::get('/show/{id}', [CotizacionesController::class, 'show']);
    Route::put('/update/{id}', [CotizacionesController::class, 'update']);
    Route::delete('/destroy/{id}', [CotizacionesController::class, 'destroy']);
});

Route::prefix('detallesCotizaciones')->group(function () {
    Route::get('/', [DetallesCotizacionesController::class, 'index']);
    Route::post('/store', [DetallesCotizacionesController::class, 'store']);
    Route::get('/show/{id}', [DetallesCotizacionesController::class, 'show']);
    Route::put('/update/{id}', [DetallesCotizacionesController::class, 'update']);
    Route::delete('/destroy/{id}', [DetallesCotizacionesController::class, 'destroy']);
});

Route::prefix('diagnosticos')->group(function () {
    Route::get('/', [DiagnosticosController::class, 'index']);
    Route::post('/store', [DiagnosticosController::class, 'store']);
    Route::get('/show/{id}', [DiagnosticosController::class, 'show']);
    Route::put('/update/{id}', [DiagnosticosController::class, 'update']);
    Route::delete('/destroy/{id}', [DiagnosticosController::class, 'destroy']);
});

Route::prefix('documentosVehiculo')->group(function () {
    Route::get('/', [DocumentosVehiculoController::class, 'index']);
    Route::post('/store', [DocumentosVehiculoController::class, 'store']);
    Route::get('/show/{id}', [DocumentosVehiculoController::class, 'show']);
    Route::put('/update/{id}', [DocumentosVehiculoController::class, 'update']);
    Route::delete('/destroy/{id}', [DocumentosVehiculoController::class, 'destroy']);
});

Route::prefix('especialidades')->group(function () {
    Route::get('/', [EspecialidadesController::class, 'index']);
    Route::post('/store', [EspecialidadesController::class, 'store']);
    Route::get('/show/{id}', [EspecialidadesController::class, 'show']);
    Route::put('/update/{id}', [EspecialidadesController::class, 'update']);
    Route::delete('/destroy/{id}', [EspecialidadesController::class, 'destroy']);
});

Route::prefix('facturas')->group(function () {
    Route::get('/', [FacturasController::class, 'index']);
    Route::post('/store', [FacturasController::class, 'store']);
    Route::get('/show/{id}', [FacturasController::class, 'show']);
    Route::put('/update/{id}', [FacturasController::class, 'update']);
    Route::delete('/destroy/{id}', [FacturasController::class, 'destroy']);
});

Route::prefix('inventarios')->group(function () {
    Route::get('/', [InventariosController::class, 'index']);
    Route::post('/store', [InventariosController::class, 'store']);
    Route::get('/show/{id}', [InventariosController::class, 'show']);
    Route::put('/update/{id}', [InventariosController::class, 'update']);
    Route::delete('/destroy/{id}', [InventariosController::class, 'destroy']);
});

Route::prefix('mecanicos')->group(function () {
    Route::get('/', [MecanicosController::class, 'index']);
    Route::post('/store', [MecanicosController::class, 'store']);
    Route::get('/show/{id}', [MecanicosController::class, 'show']);
    Route::put('/update/{id}', [MecanicosController::class, 'update']);
    Route::delete('/destroy/{id}', [MecanicosController::class, 'destroy']);
});

Route::prefix('mensajes')->group(function () {
    Route::get('/', [MensajesController::class, 'index']);
    Route::post('/store', [MensajesController::class, 'store']);
    Route::get('/show/{id}', [MensajesController::class, 'show']);
    Route::put('/update/{id}', [MensajesController::class, 'update']);
    Route::delete('/destroy/{id}', [MensajesController::class, 'destroy']);
});

Route::prefix('movimientosInventario')->group(function () {
    Route::get('/', [MovimientosInventarioController::class, 'index']);
    Route::post('/store', [MovimientosInventarioController::class, 'store']);
    Route::get('/show/{id}', [MovimientosInventarioController::class, 'show']);
    Route::put('/update/{id}', [MovimientosInventarioController::class, 'update']);
    Route::delete('/destroy/{id}', [MovimientosInventarioController::class, 'destroy']);
});

Route::prefix('notificaciones')->group(function () {
    Route::get('/', [NotificacionesController::class, 'index']);
    Route::post('/store', [NotificacionesController::class, 'store']);
    Route::get('/show/{id}', [NotificacionesController::class, 'show']);
    Route::put('/update/{id}', [NotificacionesController::class, 'update']);
    Route::delete('/destroy/{id}', [NotificacionesController::class, 'destroy']);
});

Route::prefix('pagos')->group(function () {
    Route::get('/', [PagosController::class, 'index']);
    Route::post('/store', [PagosController::class, 'store']);
    Route::get('/show/{id}', [PagosController::class, 'show']);
    Route::put('/update/{id}', [PagosController::class, 'update']);
    Route::delete('/destroy/{id}', [PagosController::class, 'destroy']);
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'index']);
    Route::post('/store', [RolesController::class, 'store']);
    Route::get('/show/{id}', [RolesController::class, 'show']);
    Route::put('/update/{id}', [RolesController::class, 'update']);
    Route::delete('/destroy/{id}', [RolesController::class, 'destroy']);
});

Route::prefix('tiposServicio')->group(function () {
    Route::get('/', [TiposServicioController::class, 'index']);
    Route::post('/store', [TiposServicioController::class, 'store']);
    Route::get('/show/{id}', [TiposServicioController::class, 'show']);
    Route::put('/update/{id}', [TiposServicioController::class, 'update']);
    Route::delete('/destroy/{id}', [TiposServicioController::class, 'destroy']);
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuariosController::class, 'index']);
    Route::post('/store', [UsuariosController::class, 'store']);
    Route::get('/show/{id}', [UsuariosController::class, 'show']);
    Route::put('/update/{id}', [UsuariosController::class, 'update']);
    Route::delete('/destroy/{id}', [UsuariosController::class, 'destroy']);
});

Route::prefix('vehiculos')->group(function () {
    Route::get('/', [VehiculosController::class, 'index']);
    Route::post('/store', [VehiculosController::class, 'store']);
    Route::get('/show/{id}', [VehiculosController::class, 'show']);
    Route::put('/update/{id}', [VehiculosController::class, 'update']);
    Route::delete('/destroy/{id}', [VehiculosController::class, 'destroy']);
});

?>