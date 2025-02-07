<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionService;
use App\Models\User;

class GameController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    // Exibe uma pergunta aleatória para o usuário com um timer
    public function index()
    {
        // Verifica se o usuário está logado (armazenado na sessão)
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        // Busca o usuário pelo ID armazenado na sessão
        $user = User::find(session('usuario_id'));
        if (!$user) {
            return redirect()->route('form.entrar')->with('error', 'Usuário não encontrado.');
        }

        // Recupera a pontuação atual do usuário a partir da tabela de users (coluna points)
        $currentScore = $user->points;

        // Busca uma pergunta aleatória
        $question = $this->questionService->getRandomQuestion();
        if (!$question) {
            return redirect()->back()->with('error', 'Nenhuma pergunta disponível no momento.');
        }

        return view('game.play', compact('question', 'currentScore'));
    }

    // Método para processar a resposta do usuário (futuro)
    public function submitAnswer(Request $request)
    {
        // Aqui você implementará a lógica para verificar a resposta e atualizar a pontuação
        // Por enquanto, apenas redirecione de volta
        return redirect()->route('game.index')->with('success', 'Resposta submetida (a ser implementada)');
    }
}
