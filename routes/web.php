<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clientes', ClienteController::class);

Route::resource('produtos', ProdutoController::class);

Route::resource('vendas', VendaController::class);
