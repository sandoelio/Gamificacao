<?php

namespace App\Services;

use App\Repositories\RankingRepository;

class RankingService
{
    protected $rankingRepository;

    public function __construct(RankingRepository $rankingRepository)
    {
        $this->rankingRepository = $rankingRepository;
    }

    public function getRankingData()
    {
        $ranking = $this->rankingRepository->getRanking();

        return [
            'labels' => $ranking->pluck('name')->toArray(),
            'points' => $ranking->pluck('points')->toArray()
        ];
    }

    public function getUserStats()
    {
        $users = $this->rankingRepository->getUserRegistrationStats();

        return [
            'labels' => $users->pluck('date')->toArray(),
            'counts' => $users->pluck('count')->toArray()
        ];
    }
}
