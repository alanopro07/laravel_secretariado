<?php

use Barryvdh\DomPDF\Facade as PDF;

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
 * ruta para salir del sistema
 */

/**
 * formato de reporte
 */
Route::post('carga_datos_pdf','dd_documentoController@descargarPdf')->name('carga_datos_pdf')->middleware('auth');

Route::get('pdf',function (){


    $pdf = PDF::loadView('reportes.ejemplo_reporte');
    $pdf->setPaper('a3','landscape');
    return $pdf->stream();

})->name('pdf');

Route::post('carga_pdf_final','dd_documentoController@cargaDatos')->name('carga_pdf_final')->middleware('auth');


//aorobar y eliminar registros

Route::post('rechazarazar_reporte','dd_documentoController@rechazarReporte')->name('rechazar')->middleware('auth');

Route::post('aceptar_reporte','dd_documentoController@aceptarReporte')->name('aceptar')->middleware('auth');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

