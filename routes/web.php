<?php

use App\Http\Controllers\GestaoLivrosController;
use Illuminate\Support\Facades\Route;

Route::get('/gestao-livros', [GestaoLivrosController::class, 'index'])->name('gestao-livros');
