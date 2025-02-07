@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Lista de Perguntas</h1>
    
    <a href="{{ route('questions.create') }}" class="btn btn-success mb-3">➕ Adicionar Pergunta</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Pergunta</th>
                    <th>Resposta Correta</th>
                    <th>Pontos</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->answer_correct }}</td>
                        <td>{{ $question->points }}</td>
                        <td>
                            @if ($question->image)
                                <img src="data:image/png;base64,{{ $question->image }}" alt="Imagem" class="img-thumbnail" width="100">
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </td>
                        <td class="d-flex flex-column flex-md-row align-items-center">
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary btn-sm me-md-2 mb-2 mb-md-0">✏ Editar</a>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    🗑 Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
