<?php

namespace App\Services;

use App\Repositories\QuestionRepository;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function createQuestion(array $data)
    {
        if (isset($data['image']) && $data['image']->isValid()) {
                $image = $data['image'];
                $data['image'] = base64_encode(file_get_contents($image->getRealPath())); // Converte para Base64
            } else {
                $data['image'] = null;
            }

        return $this->questionRepository->create($data);

    }

    public function getAllQuestions()
    {
        return $this->questionRepository->getAll();
    }

    public function getQuestionById($id)
    {
        return $this->questionRepository->findById($id);
    }

    public function updateQuestion($id, array $data)
    {
        return $this->questionRepository->update($id, $data);
    }

    public function getRandomQuestion()
    {
        return $this->questionRepository->getRandom();
    }

}

