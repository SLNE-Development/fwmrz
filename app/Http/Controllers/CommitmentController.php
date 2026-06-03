<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommitmentController extends Controller
{
    public function index(Request $request): View
    {
        $selectedYear = $request->integer('year') ?: now()->year;

        $years = Commitment::query()
            ->where('publicity', 2)
            ->selectRaw('YEAR(start) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        // Fall back to most recent year if selected year has no entries
        if ($years->isNotEmpty() && !$years->contains($selectedYear)) {
            $selectedYear = $years->first();
        }

        $commitments = Commitment::query()
            ->where('publicity', 2)
            ->whereYear('start', $selectedYear)
            ->with(['type'])
            ->orderByDesc('start')
            ->paginate(12)
            ->withQueryString();

        return view('pages.einsaetze.index', compact('commitments', 'years', 'selectedYear'));
    }

    public function show(Commitment $commitment): View
    {
        abort_if($commitment->publicity < 2, 404);

        $commitment->load(['type', 'author', 'stations']);

        return view('pages.einsaetze.show', compact('commitment'));
    }
}
