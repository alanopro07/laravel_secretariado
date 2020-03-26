<?php
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//Route::get('municipio','municipioController@dashboardMunicipio')->name('municipio');
Route::get('municipio', 'municipioController@dashboardMunicipio')->name('municipio');

Route::post('cargarArchivos','municipioController@cargaArchivos')->name('cargarArchivos');

//carga de datos carta bancaria
Route::get('cargaCartaBancaria','municipioController@cargaCartaBancaria')->name('cargacartabancaria');//revisado
Route::post('cargaDatosCartaBancaria','municipioController@cargarDatosCartaBacaria')->name('cargadatoscartabancaria');


//carga datos de cooparticipacion
Route::get('cargaCooparticipacion','municipioController@cargaCooparticipacion')->name('cartacooparticipacion');

//carga datos cedula-fiscal
Route::get('cargaDatosCedulaFiscal','municipioController@cargaCedulaFIscal')->name('cargadatoscedulafiscal');

//carga domicilio
Route::get('cargaConstanciaDomicilio','municipioController@cargaDomicilio')->name('cargadomicilio');



//ruta de carga-bancaria (municipio)
Route::get('carga_carta_bancaria',function (){

    return view('MUNICIPIO.carta_bancaria');
})->name('carga_carta_bancaria');

//ruta de carga-carta-domicilio (municipio)
Route::get('carga_carta_cedula',function (){

    return view('MUNICIPIO.carta_cedula');
})->name('carga_carta_cedula');

//ruta de carga-carta-domicilio (municipio)
Route::get('carga_carta_domicilio',function (){

    return view('MUNICIPIO.carga_domicilio');
})->name('carga_carta_domicilio');


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
 * ajax prueva
 */

Route::post('municipios_de_estado','dd_documentoController@municipios_de_estado')->name('municipios_de_estado')->middleware('auth');
/**
 * ruta para salir del sistema
 */
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

