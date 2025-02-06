<?php

namespace App\Services;

use App\Models\LivrosModel;

class GestaoLivrosService
{
    public function listarLivros()
    {
        return LivrosModel::with('autor')->all();
    }
}