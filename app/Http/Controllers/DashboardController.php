<?php

namespace App\Http\Controllers;

use App\Services\RankingService;
use Illuminate\Http\JsonResponse;


class DashboardController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function getRankingData(): JsonResponse
    {
        $data = $this->rankingService->getRankingData();
       //dd($data);
        return response()->json($data);
    }

    public function getUserStats()
    {
        $data = $this->rankingService->getUserStats();
      // dd($data);
        return response()->json($data);
    }
}
