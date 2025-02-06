<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\GestaoLivrosService;
use Illuminate\Http\Request;

class GestaoLivrosController extends Controller
{
    protected $gestaoLivrosService;

    public function __construct(GestaoLivrosService $gestaoLivrosService)
    {
        $this->gestaoLivrosService = $gestaoLivrosService;
    }

    public function index()
    {
        $result = $this->gestaoLivrosService->listarLivros();

        return view('gestao.gestao-livros', $result);
    }

    public function registraLivro(Request $request)
    {
        $response = $this->gestaoLivrosService->registraLivro($request->input('title'), $request->input('descricao'), $request->input('autor'), $request->input('data_publicacao'));

        $this->makeMessage($request, $response);

        return redirect()->back();
    }
}