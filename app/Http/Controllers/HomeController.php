<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestCommitment = Commitment::query()
            ->where('publicity', 2)
            ->with(['type', 'stations'])
            ->orderByDesc('start')
            ->first();

        $latestNews = News::query()
            ->where('publicity', 2)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return view('pages.home', compact('latestCommitment', 'latestNews'));
    }
}

