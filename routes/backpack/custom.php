<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('registroinventario', 'RegistroinventarioCrudController');
    Route::crud('cliente', 'ClienteCrudController');
    Route::crud('venta', 'VentaCrudController');
    Route::crud('montura', 'MonturaCrudController');
    Route::crud('lente', 'LenteCrudController');
    Route::crud('detalleventa', 'DetalleventaCrudController');
    Route::crud('inventario', 'InventarioCrudController');
    Route::crud('sucursal', 'SucursalCrudController');
    Route::crud('empleado', 'EmpleadoCrudController');
    Route::crud('proveedor', 'ProveedorCrudController');
    Route::crud('compra', 'CompraCrudController');
    Route::crud('detallecompra', 'DetallecompraCrudController');
    Route::crud('invoice', 'InvoiceCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
