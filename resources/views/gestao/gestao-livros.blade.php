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
            <form method="POST" action="{{ route('registra-livros') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Título" maxlength="191" required>
                        <label for="title">Título</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control" placeholder="Descrição" name="descricao" id="descricao" maxlength="191" required></textarea>
                        <label for="descricao">Descrição</label>
                    </div>
                    <select class="form-select mb-2" name="autor" aria-label="Default select example" required>
                        <option selected disabled>Selecione...</option>
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>"
                        @endforeach
                    </select>
                    <div class="form-floating mb-2">
                        <input type="date" class="form-control" name="data_publicacao" id="data_publicacao" placeholder="Data" max="{{ date('Y-m-d') }}" required>
                        <label for="data_publicacao">Data publicação</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Autor</th>
                <th>Data publicação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>{{ $livro->autor->nome }}</td>
                    <td>{{ date('d/m/Y', strtotime($livro->data_publicacao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $livros->links() }}
    </div>
@endsection