<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionService;
use App\Services\GameService;
use App\Models\User;

class GameController extends Controller
{
    protected $questionService;
    protected $gameService;

    public function __construct(QuestionService $questionService, GameService $gameService)
    {
        $this->questionService = $questionService;
        $this->gameService = $gameService;
    }

    // Exibe uma pergunta aleatória para o usuário com um timer
    public function index()
    {
        // Verifica se o usuário está logado
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        $userId = session('usuario_id');

        // Se o usuário já respondeu 15 perguntas, redireciona para Game Over
        if ($this->gameService->hasUserCompletedGame($userId)) {
            return redirect()->route('game.over')->with('message', 'Você já respondeu 15 perguntas!');
        }

        // Busca o usuário
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('form.entrar')->with('error', 'Usuário não encontrado.');
        }
        
        // Obtém uma pergunta aleatória que o usuário ainda não respondeu
        $question = $this->questionService->getRandomQuestionForUser($user->id);
        if (!$question) {
            return redirect()->route('game.over')->with('error', 'Não há mais perguntas disponíveis.');
        }
        
        $currentScore = $user->points;

        return view('game.play', compact('question', 'user', 'currentScore'));
    }

    // Processa a resposta do usuário
    public function submitAnswer(Request $request)
    {
        $request->validate([
            'user_answer'  => 'required|string',
            'question_id'  => 'required|integer',
        ]);

        $userId = session('usuario_id');

        // Chama o service para avaliar a resposta e atualizar a pontuação
        $isCorrect = $this->gameService->evaluateAnswer($request->question_id, $request->user_answer, $userId);

        $message = $isCorrect 
            ? "Resposta correta! Pontuação atualizada." 
            : "Resposta errada! Pontuação atualizada.";

        return redirect()->route('game.index')->with('success', $message);
    }

    public function gameOver()
    {
        // Verifica se o usuário está logado
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        $user = User::find(session('usuario_id'));
        $currentScore = $user ? $user->points : 0;

        return view('game.gameover', compact('currentScore'));
    }

    public function dashboard()
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        $user = User::find(session('usuario_id'));

        // Obtém os 10 melhores jogadores ordenados pela pontuação (ranking)
        $ranking = User::orderByDesc('points')->limit(10)->get();

        return view('game.dashboard', compact('user', 'ranking'));
    }

     // quando o tempo acaba, aplica penalidade e mostra a tela de "Tempo Esgotado"
     public function timeUp()
     {
         if (!session()->has('usuario_id')) {
             return redirect()->route('form.entrar');
         }
         $userId = session('usuario_id');
         $this->gameService->applyTimePenalty($userId, 6);
         $user = User::find($userId);
         $currentScore = $user ? $user->points : 0;
         return view('game.timeup', compact('currentScore'));
     }
}