<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','InicioController@index')->name('inicio');
Route::get('seguridad/login','Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login','Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout','Seguridad\LoginController@logout')->name('logout');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' =>['auth','superadmin']], function () {
//Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],  function () {

    /**RUTAS DE PERMISO */
    Route::get('','AdminController@index');
    Route::get('permiso','PermisoController@index')->name('permiso');    
    Route::get('permiso/crear','PermisoController@crear')->name('crear_permiso'); 
    Route::get('permiso/{id}/editar','PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}','PermisoController@actualizar')->name('actualizar_permiso');
    Route::post('permiso','PermisoController@guardar')->name('guardar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');  

    
    /*RUTAS DEL MENU*/
    Route::get('menu','MenuController@index')->name('menu'); 
    Route::get('menu/crear','MenuController@crear')->name('crear_menu'); 
    Route::post('menu','MenuController@guardar')->name('guardar_menu'); 
    Route::get('menu/modificar','MenuController@modificar')->name('modificar');
    Route::post('menu/guardar-orden','MenuController@guardarOrden')->name('guardar_orden');
    Route::get('menu/{id}/editar','MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}','MenuController@actualizar')->name('actualizar_menu'); 
    Route::delete('menu/{id}', 'MenuController@eliminar')->name('eliminar_menu');  
    
    /**RUTAS DEL ROL*/
    Route::get('rol','RolController@index')->name('rol'); 
    Route::get('rol/crear','RolController@crear')->name('crear_rol');
    Route::post('rol','RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar','RolController@editar')->name('editar_rol');
    Route::put('rol/{id}','RolController@actualizar')->name('actualizar_rol'); 
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol'); 

    /**RUTAS DEL MENU-ROL */
    Route::get('menu-rol','MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol','MenuRolController@guardar')->name('guardar_menu_rol');

    
    /**RUTAS DEL PERMISO-ROL */
    Route::get('permiso-rol','PermisoRolController@index')->name('permiso_rol');
    Route::post('permiso-rol','PermisoRolController@guardar')->name('guardar_permiso_rol');

    
    /**RUTAS DEL INSUMO */
    Route::get('insumo','InsumoController@index')->name('insumo');

});


Route::group(['prefix' => 'almacen', 'namespace' => 'Almacen', 'middleware' =>['auth','superadmin']], function () {

    /**RUTAS DEL INSUMO */
    Route::get('insumo','InsumoController@index')->name('insumo');
    Route::get('insumo/crear','InsumoController@crear')->name('crear_insumo');
});