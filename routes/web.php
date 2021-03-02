<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



/*
Telas para ver o funcionamento sem dados
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clientes', ClienteController::class);

Route::resource('produtos', ProdutoController::class);

Route::resource('vendas', VendaController::class);

// Route::get('/sales', function () {
//     return view('crud_sales');
// });
// Route::get('/products', function () {
//     return view('crud_products');
// });
