<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\GameService;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Penalty;
use Mockery;

class GameServiceTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testeIniciarJogo()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('startGame')
            ->with($user)
            ->andReturn($question);

        $this->assertInstanceOf(Question::class, $gameService->startGame($user));
    }

    public function testeEnviarResposta()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $answer = Mockery::mock(Answer::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('submitAnswer')
            ->with($user, $question, $answer)
            ->andReturn(true);

        $this->assertTrue($gameService->submitAnswer($user, $question, $answer));
    }

    public function testeFinalizarJogo()
    {
        $user = Mockery::mock(User::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('endGame')
            ->with($user)
            ->andReturn(true);

        $this->assertTrue($gameService->endGame($user));
    }

    public function testePularPergunta()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('skipQuestion')
            ->with($user, $question)
            ->andReturn(true);

        $this->assertTrue($gameService->skipQuestion($user, $question));
    }

    public function testeObterPergunta()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('getQuestion')
            ->with($user)
            ->andReturn($question);

        $this->assertInstanceOf(Question::class, $gameService->getQuestion($user));
    }

    public function testeObterResposta()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('getAnswer')
            ->with($user, $question)
            ->andReturn(true);

        $this->assertTrue($gameService->getAnswer($user, $question));
    }

    public function testeObterPontuacao()
    {
        $user = Mockery::mock(User::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('getScore')
            ->with($user)
            ->andReturn(0);

        $this->assertEquals(0, $gameService->getScore($user));
    }
    
    public function testeAvaliarResposta()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('evaluateAnswer')
            ->with(1, 'answer', 1)
            ->andReturn(true);

        $this->assertTrue($gameService->evaluateAnswer(1, 'answer', 1));
    }

    public function testeUsuarioCompletouJogo()
    {
        $user = Mockery::mock(User::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('hasUserCompletedGame')
            ->with(1)
            ->andReturn(true);

        $this->assertTrue($gameService->hasUserCompletedGame(1));
    }

    public function testeAplicarPenalidadeDeTempo()
    {
        $user = Mockery::mock(User::class);
        $question = Mockery::mock(Question::class);
        $penalty = Mockery::mock(Penalty::class);
        $gameService = Mockery::mock(GameService::class);

        $gameService->shouldReceive('applyTimePenalty')
            ->with(1, 1, 6)
            ->andReturn(true);

        $this->assertTrue($gameService->applyTimePenalty(1, 1, 6));
    }
}


