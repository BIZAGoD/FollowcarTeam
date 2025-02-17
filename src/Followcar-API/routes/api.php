<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoriasInventarioController,
    CategoriasServicioController,
    CitasController,
    CotizacionesController,
    DetallesCotizacionesController,
    DiagnosticosController,
    DocumentosVehiculoController,
    EspecialidadesController,
    FacturasController,
    InventariosController,
    MecanicosController,
    MensajesController,
    MovimientosInventarioController,
    NotificacionesController,
    PagosController,
    RolesController,
    TiposServicioController,
    UsuariosController,
    VehiculosController,
    TalleresController,
    CitasClienteController,
    TiposServicio
};
Route::resource('categoriasInventario', CategoriasInventarioController::class);
Route::resource('categoriasServicio', CategoriasServicioController::class);
Route::resource('citas', CitasController::class);
Route::resource('cotizaciones', CotizacionesController::class);
Route::resource('detallesCotizaciones', DetallesCotizacionesController::class);
Route::resource('diagnosticos', DiagnosticosController::class);
Route::resource('documentosVehiculo', DocumentosVehiculoController::class);
Route::resource('especialidades', EspecialidadesController::class);
Route::resource('facturas', FacturasController::class);
Route::resource('inventarios', InventariosController::class);
Route::resource('mecanicos', MecanicosController::class);
Route::resource('mensajes', MensajesController::class);
Route::resource('movimientosInventario', MovimientosInventarioController::class);
Route::resource('notificaciones', NotificacionesController::class);
Route::resource('pagos', PagosController::class);
Route::resource('roles', RolesController::class);
Route::resource('tiposServicio', TiposServicioController::class);
Route::resource('usuarios', UsuariosController::class);
Route::resource('vehiculos', VehiculosController::class);
Route::resource('talleres', TalleresController::class);
Route::resource('citasClientes', CitasClienteController::class);
?>