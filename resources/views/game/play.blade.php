@extends('layouts.app')

@section('title', 'Jogar')

@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Responda a Pergunta</h1>

    <!-- Painel de Informações -->
    <div class="row mb-4">
        <!-- Pontuação Atual -->
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Pontuação Atual</h5>
                    <p class="card-text">{{ $currentScore }} pontos</p>
                </div>
            </div>
        </div>
        <!-- Valor da Pergunta -->
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Valor da Pergunta</h5>
                    <p class="card-text">{{ $question->points }} pontos</p>
                </div>
            </div>
        </div>
        <!-- Pontos a Perder se Errar -->
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Pontos Perdidos se Errar</h5>
                    <p class="card-text">{{ round($question->points * 0.5) }} pontos</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Exibição da Pergunta -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{ $question->question_text }}</h3>
            @if ($question->image)
                <div class="text-center my-3">
                    <img src="data:image/png;base64,{{ $question->image }}" alt="Imagem da pergunta" class="img-fluid" style="max-width:300px;">
                </div>
            @endif
        </div>
    </div>

    <!-- Timer -->
    <div class="text-center mb-4">
        <h4>Tempo restante: <span id="timer">30</span> segundos</h4>
    </div>

    <!-- Formulário para enviar a resposta -->
    <form action="{{ route('game.submitAnswer') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="user_answer" class="form-control" placeholder="Sua resposta..." required>
            <input type="hidden" name="question_id" value="{{ $question->id }}">
        </div>
        <button type="submit" class="btn btn-primary w-100" id="submitBtn">Enviar Resposta</button>
    </form>
</div>

<script>
    // Timer de 30 segundos
    var timeLeft = 30;
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
        if (timeLeft <= 0) {
            clearInterval(timerId);
            document.getElementById("submitBtn").disabled = true;
        } else {
            document.getElementById("timer").innerHTML = timeLeft;
        }
        timeLeft--;
    }
</script>
@endsection
