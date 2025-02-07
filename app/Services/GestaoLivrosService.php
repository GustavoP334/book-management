<?php

namespace App\Services;

use App\Models\AutoresModel;
use App\Models\LivrosModel;

class GestaoLivrosService
{
    public function listarLivros(): array
    {
        $autores = AutoresModel::get()->all();

        $livros = LivrosModel::with('autor')->paginate(10);

        return [
            'autores' => $autores,
            'livros' => $livros
        ];
    }

    public function registraLivro($titulo, $descricao, $autor, $dataPublicacao): string
    {
        try {
            $livro = LivrosModel::firstOrCreate(
                [
                    'titulo' => $titulo,
                    'autor_id' => $autor
                ],
                [
                    'descricao' => $descricao,
                    'data_publicacao' => $dataPublicacao
                ]
            );

            $response = 'Livro registrado com sucesso.';
        } catch (\Throwable $th) {
            return 'Erro ao registrar livro.';
        }

        $response = !$livro->wasRecentlyCreated ? 'Livro já existe.' : $response;

        return $response;
    }

    public function deletaLivro($id)
    {
        try {
            LivrosModel::destroy($id);

            return 'Livro deletado com sucesso.';
        } catch (\Throwable $th) {
            return 'Erro ao deletar livro.';
        }
    }

    public function editarLivro($id, $titulo, $descricao, $autor, $dataPublicacao)
    {
        try {
            LivrosModel::updateOrCreate(
                ['id' => $id],
                [
                    'titulo' => $titulo,
                    'autor_id' => $autor,
                    'descricao' => $descricao,
                    'data_publicacao' => $dataPublicacao
                ]
            );

            return 'Livro atualizado com sucesso.';
        } catch (\Throwable $th) {
            return 'Erro ao atualizar livro.';
        }
    }
}