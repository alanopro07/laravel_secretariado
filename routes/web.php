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
 * ruta para salir del sistema
 */

/**
 * formato de reporte
 */
Route::post('carga_datos_pdf','dd_documentoController@descargarPdf')->name('carga_datos_pdf')->middleware('auth');

Route::post('pdf',function (){


    $pdf = PDF::loadView('reportes.reporte_pdf');
    $pdf->setPaper('a3','landscape');
    $pdf->stream();
    return redirect('cargar_reporte_trimestral');
});

Route::post('carga_pdf_final','dd_documentoController@cargaDatos')->name('carga_pdf_final')->middleware('auth');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

