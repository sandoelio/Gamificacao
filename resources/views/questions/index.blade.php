@extends('layouts.app')

@section('title', 'Gerenciamento de Perguntas')

@section('content')

<div class="row">
  <!-- Coluna para inserir nova pergunta -->
  <div class="col-md-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Adicionar Nova Pergunta</h4>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="question_text" class="form-label">Pergunta:</label>
                <textarea name="question_text" id="question_text" class="form-control" maxlength="150" required></textarea>
                <small class="text-muted">Máximo de 150 caracteres.</small>
            </div>
            <div class="mb-3">
                <label for="answer_correct" class="form-label">Resposta Correta:</label>
                <input type="text" name="answer_correct" id="answer_correct" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="points" class="form-label">Pontuação:</label>
                <input type="number" name="points" id="points" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagem (opcional):</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Salvar Pergunta</button>
            <br>
            <br>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger w-100">Voltar</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
