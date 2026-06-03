<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function organisation(): View
    {
        return view('pages.organisation');
    }

    public function mitmachen(): View
    {
        return view('pages.mitmachen');
    }

    public function kontakt(): View
    {
        return view('pages.kontakt');
    }

    public function kontaktSend(Request $request): RedirectResponse
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:200'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'privacy' => ['accepted'],
        ]);

        // TODO: Mail::to('wehrleitung@gemeinde-merzenich.de')->send(new ContactMail($request->all()));

        return redirect()->route('kontakt')->with('success', true);
    }

    public function impressum(): View
    {
        return view('pages.impressum');
    }

    public function datenschutz(): View
    {
        return view('pages.datenschutz');
    }
}

