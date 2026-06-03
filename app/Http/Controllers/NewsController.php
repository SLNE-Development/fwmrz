<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->where('publicity', 2)
            ->with(['author'])
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('pages.news.index', compact('news'));
    }

    public function show(News $news): View
    {
        abort_if($news->publicity < 2, 404);

        $news->load('author');

        return view('pages.news.show', compact('news'));
    }
}

