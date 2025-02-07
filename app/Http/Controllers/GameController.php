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
        
            $user = User::find(session('usuario_id'));
        
            if (!$user) {
                return redirect()->route('form.entrar')->with('error', 'Usuário não encontrado.');
            }
        
            // Verifica quantas perguntas o usuário já respondeu
            $answeredCount = $user->answers()->count(); 
        
            if ($answeredCount >= 15) {
                return redirect()->route('game.over'); // Se já respondeu 15 perguntas, vai para Game Over
            }
        
            // Obtém uma pergunta aleatória que o usuário ainda não respondeu
            $question = $this->questionService->getRandomQuestion($user->id);
             // Recupera o usuário
            $user = \App\Models\User::find(session('usuario_id'));
            $currentScore = $user ? $user->points : 0;
        
            if (!$question) {
                return redirect()->route('game.over')->with('error', 'Não há mais perguntas disponíveis.');
            }
        
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
        // Verifica se o usuário está logado (armazenado na sessão)
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        // Recupera o usuário
        $user = \App\Models\User::find(session('usuario_id'));
        $currentScore = $user ? $user->points : 0;

        return view('game.gameover', compact('currentScore'));
    }

    public function dashboard()
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('form.entrar');
        }

        // Obtém o usuário logado
        $user = User::find(session('usuario_id'));

        // Obtém os 10 melhores jogadores ordenados pela pontuação (ranking)
        $ranking = User::orderByDesc('points')->limit(10)->get();

        return view('game.dashboard', compact('user', 'ranking'));
    }


}
