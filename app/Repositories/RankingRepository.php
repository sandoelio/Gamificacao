<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;

class RankingRepository
{
    public function getRanking()
    {
        return User::join('answers', 'users.id', '=', 'answers.user_id')
            ->join('questions', 'answers.question_id', '=', 'questions.id')
            ->select('users.name')
            ->selectRaw('SUM(answers.is_correct * questions.points) as total_points')
            ->groupBy('users.name')
            ->orderByDesc('total_points')
            ->limit(10)
            ->get();
    }

    public function getUserRegistrationStats()
    {
        return User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    }
}
