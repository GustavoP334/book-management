<?php

use Illuminate\Support\Facades\Route;

Route::get('/gestao-livros', function () {
    return view('gestao.gestao-livros');
});
