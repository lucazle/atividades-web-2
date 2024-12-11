@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Detalhes do Livro</h1>

    <!-- Card com Detalhes do Livro -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>Título:</strong> {{ $book->title }}
        </div>
        <div class="card-body d-flex align-items-start">
            <!-- Exibição da Imagem de Capa -->
            <div class="me-4">
                <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('images/default-cover.jpg') }}" 
                     alt="{{ $book->title }}" 
                     class="img-fluid rounded" 
                     style="max-width: 200px; height: auto;">
            </div>

            <!-- Informações do Livro -->
            <div>
                <p><strong>Autor:</strong>
                    <a href="{{ route('authors.show', $book->author->id) }}">
                        {{ $book->author->name }}
                    </a>
                </p>
                <p><strong>Editora:</strong>
                    <a href="{{ route('publishers.show', $book->publisher->id) }}">
                        {{ $book->publisher->name }}
                    </a>
                </p>
                <p><strong>Categoria:</strong>
                    <a href="{{ route('categories.show', $book->category->id) }}">
                        {{ $book->category->name }}
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Card para Registrar Empréstimo -->
    <div class="card mb-4">
        <div class="card-header">
            Registrar Empréstimo
        </div>
        <div class="card-body">
            <form action="{{ route('books.borrow', $book) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuário</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="" selected>Selecione um usuário</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Registrar Empréstimo</button>
            </form>
        </div>
    </div>

    <!-- Botões Voltar e Deletar -->
    <div class="d-flex justify-content-between mt-3">
        <!-- Botão Voltar -->
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <!-- Botão Deletar -->
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este livro?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Deletar Livro
            </button>
        </form>
    </div>
</div>
@endsection
