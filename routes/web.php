<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('almacen/categoria', CategoriaController::class);
Route::resource('almacen/producto', ProductoController::class);
Route::resource('compras/proveedor', ProveedorController::class);
Route::resource('compras/ingreso', IngresoController::class);
Route::resource('ventas/venta', VentaController::class);
Route::resource('ventas/clientes', ' ClienteController');
Route::put('almacen/producto/{id}/aprobar', [ProductoController::class, 'aprobar'])->name('producto.aprobar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Auth::routes(); */

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
