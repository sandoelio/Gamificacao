<?php

namespace Tests\Unit;

use App\Services\QuestionService;
use App\Repositories\QuestionRepository;
use Mockery;
use Tests\TestCase;

class QuestionServiceTest extends TestCase
{
    public function testeCriarPerguntaSucesso()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('create')->once()->andReturn([
            'id' => 1,
            'question_text' => 'Pergunta mockada',
            'answer_correct' => 'Resposta',
            'points' => 10
        ]);

        $questionService = new QuestionService($mockRepo);
        $data = [
            'question_text' => 'Pergunta mockada',
            'answer_correct' => 'Resposta',
            'points' => 10
        ];

        $result = $questionService->createQuestion($data);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['id']);
    }

    public function testeObterPerguntaAleatoriaExcluiPerguntasRespondidas()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('getRandomQuestionForUser')->with(1)->andReturn([
            'id' => 3,
            'question_text' => 'Pergunta aleatória',
            'answer_correct' => 'Resposta',
            'points' => 10
        ]);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getRandomQuestionForUser(1);

        $this->assertIsArray($result);
        $this->assertEquals(3, $result['id']);
    }

    public function testeObterPerguntaAleatoriaSemPerguntasDisponíveis()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('getRandomQuestionForUser')->with(1)->andReturn(null);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getRandomQuestionForUser(1);

        $this->assertNull($result);
    }

    public function testeObterPerguntaPorId()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('findById')->with(1)->andReturn([
            'id' => 1,
            'question_text' => 'Pergunta mockada',
            'answer_correct' => 'Resposta',
            'points' => 10
        ]);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getQuestionById(1);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['id']);
    }

    public function testeObterPerguntaPorIdInexistente()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('findById')->with(1)->andReturn(null);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getQuestionById(1);

        $this->assertNull($result);
    }

    public function testeAtualizarPergunta()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('update')->with(1, [
            'question_text' => 'Pergunta atualizada',
            'answer_correct' => 'Resposta atualizada',
            'points' => 20
        ])->andReturn(true);

        $questionService = new QuestionService($mockRepo);
        $data = [
            'question_text' => 'Pergunta atualizada',
            'answer_correct' => 'Resposta atualizada',
            'points' => 20
        ];

        $result = $questionService->updateQuestion(1, $data);

        $this->assertTrue($result);
    }

    public function testeObterTodasPerguntas()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('getAll')->andReturn([
            [
                'id' => 1,
                'question_text' => 'Pergunta 1',
                'answer_correct' => 'Resposta 1',
                'points' => 10
            ],
            [
                'id' => 2,
                'question_text' => 'Pergunta 2',
                'answer_correct' => 'Resposta 2',
                'points' => 20
            ]
        ]);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getAllQuestions();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    public function testeObterTodasPerguntasSemPerguntas()
    {
        $mockRepo = Mockery::mock(QuestionRepository::class);
        $mockRepo->shouldReceive('getAll')->andReturn([]);

        $questionService = new QuestionService($mockRepo);
        $result = $questionService->getAllQuestions();

        $this->assertIsArray($result);
        $this->assertCount(0, $result);
    }
}
