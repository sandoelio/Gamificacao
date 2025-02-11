@extends('layouts.app')

@section('title', 'Relatório de Usuários')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Relatório de Usuários</h2>

    @if(count($reportData) > 0)
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Ranking</th>
                    <th>Nome do Usuário</th>
                    <th>Pontuação</th>
                    <th>Perguntas e Respostas</th>
                    <th>Punições por Tempo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportData as $data)
                <tr>
                    <td>{{ $data['ranking'] }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['points'] }}</td>
                    <td>
                        @if($data['answers']->count() > 0)
                            <ul class="list-unstyled">
                                @foreach($data['answers'] as $answer)
                                    <li>
                                        <strong>P:</strong> 
                                        <span class="short-text">
                                            {{ Str::limit($answer->question->question_text ?? 'N/A', 50) }}
                                        </span>
                                        <pre class="full-text d-none">{{ $answer->question->question_text ?? 'N/A' }}</pre>
                                        @if(strlen($answer->question->question_text ?? '') > 50)
                                            <a href="#" class="toggle-text">Ver mais...</a>
                                        @endif
                                        <br>
                                        <strong>R:</strong> 
                                        <span class="short-text">
                                            {{ Str::limit($answer->response, 50) }}
                                        </span>
                                        <pre class="full-text d-none">{{ $answer->response }}</pre>
                                        @if(strlen($answer->response) > 50)
                                            <a href="#" class="toggle-text">Ver mais...</a>
                                        @endif
                                        @if($answer->is_correct)
                                            <span class="badge bg-success">Correta</span>
                                        @else
                                            <span class="badge bg-danger">Errada</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>Sem respostas</span>
                        @endif
                    </td>
                    <td>
                        @if($data['penalties']->count() > 0)
                            <ul class="list-unstyled">
                                @foreach($data['penalties'] as $penalty)
                                <li>
                                    <strong>Questão ID:</strong> {{ $penalty->question_id }}<br>
                                    <strong>Pontos Perdidos:</strong> {{ $penalty->penalty_points }}
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <span>Sem punições</span>
                            @endif
                        </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">Nenhum dado para exibir.</p>
    @endif
</div>
<a href="{{ route('questions.index') }}" class="btn btn-secondary w-100">Voltar</a>
<style>
    .short-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        max-width: 200px;
        text-align: center; /* Centraliza o texto */
    }
    .full-text {
        display: block;
        white-space: normal; /* Permite quebra de linha */
        word-break: break-all; /* Permite quebra de palavras longas */
        width: 200px; /* Largura máxima */
        text-align: center; /* Centraliza o texto */
    }
</style>

{{-- Script para alternar o texto completo --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.toggle-text').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let parent = this.parentElement;
                parent.querySelector('.short-text').classList.toggle('d-none');
                parent.querySelector('.full-text').classList.toggle('d-none');
                this.textContent = this.textContent === "Ver mais..." ? "Ver menos..." : "Ver mais...";
            });
        });
    });
</script>
@endsection
