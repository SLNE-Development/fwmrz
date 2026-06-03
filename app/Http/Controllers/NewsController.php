<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $request->validate([
            'year' => ['sometimes', 'integer', 'min:2000', 'max:' . (now()->year + 1)],
        ]);

        $selectedYear = $request->integer('year') ?: now()->year;

        $years = News::query()
            ->where('publicity', 2)
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        if ($years->isNotEmpty() && !$years->contains($selectedYear)) {
            $selectedYear = $years->first();
        }

        $news = News::query()
            ->where('publicity', 2)
            ->whereYear('created_at', $selectedYear)
            ->with(['author'])
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('pages.news.index', compact('news', 'years', 'selectedYear'));
    }

    public function show(News $news): View
    {
        abort_if($news->publicity < 2, 404);

        $news->load('author');

        return view('pages.news.show', compact('news'));
    }
}
