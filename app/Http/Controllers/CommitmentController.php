<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use Illuminate\View\View;

class CommitmentController extends Controller
{
    public function index(): View
    {
        $commitments = Commitment::query()
            ->where('publicity', 2)
            ->with(['type'])
            ->orderByDesc('start')
            ->paginate(12);

        return view('pages.einsaetze.index', compact('commitments'));
    }

    public function show(Commitment $commitment): View
    {
        abort_if($commitment->publicity < 2, 404);

        $commitment->load(['type', 'author', 'stations']);

        return view('pages.einsaetze.show', compact('commitment'));
    }
}

