@extends('app')

@section('title', 'Gestão de Livros')

@section('imports')
@endsection

@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#livro">
        Adicionar Livro
    </button>

    <div class="modal fade" id="livro" tabindex="-1" aria-labelledby="livroLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="livroLabel">Livro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="title" placeholder="Título" maxlength="191">
                        <label for="title">Título</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Descrição" id="descricao"></textarea>
                        <label for="descricao">Descrição</label>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success">Salvar</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection