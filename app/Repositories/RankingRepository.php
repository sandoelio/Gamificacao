<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;

class RankingRepository
{
    public function getRanking()
    {
        return User::select('name', 'points')
            ->where('is_admin', '!=', 1)
            ->orderByDesc('points')
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
