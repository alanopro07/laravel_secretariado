<?php
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');


/**
 * historia de usuario HU-2 veririfacion de informe (rutas)
 */
Route::get('visualizar_reportes_trimestrales','dd_documentoController@mostrarReportes')->name('visualizar_reportes_trimestrales')->middleware('auth');
/**
 * fin de rutas
 */

/**+
 * histios de usuario HU-1 carga de datos (rutas9
 */
Route::get('cargar_reporte_trimestral','dd_documentoController@formularioReporte')->name('cargar_reporte_trimestral')->middleware('auth');
/**
 * fin de rutas
 */


/**
 * descar frmato
 */

Route::get('descarga_formato','dd_documentoController@descargarPlantilla')->name('descarga_formato')->middleware('auth');

/**
 * carga de reporte trimestral
 */

Route::post('carga_reporte_trimestral','dd_documentoController@cargaDatos')->name('carga_reporte_trimestral')->middleware('auth');
/**
 * ruta para salir del sistema
 */
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

