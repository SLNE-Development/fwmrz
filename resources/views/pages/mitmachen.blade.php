@extends('layouts.app')
@section('title', 'Mitmachen | Freiwillige Feuerwehr Merzenich')
@section('description', 'Werde Mitglied der Freiwilligen Feuerwehr Merzenich oder der Jugendfeuerwehr.')

@section('content')

<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span>
      <span class="text-zinc-300">Mitmachen</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Mitmachen</h1>
    <p class="text-zinc-400 max-w-2xl">Vielen Dank für Ihr Interesse an einer Mitgliedschaft in der
      Freiwilligen Feuerwehr der Gemeinde Merzenich.</p>
  </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-14">

  {{-- Intro --}}
  <div class="text-center max-w-2xl mx-auto">
    <p class="text-zinc-700 dark:text-zinc-300 leading-relaxed text-lg">
      Grundsätzlich kann jeder Mitglied in der Feuerwehr werden –
      egal ob aktiver Einsatzdienst, Jugendfeuerwehr oder fördernde Mitgliedschaft.
    </p>
  </div>

  {{-- Two options --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

    {{-- Aktive Feuerwehr --}}
    <div
        class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-400 dark:hover:border-red-700/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-1 group">
      <div
          class="w-14 h-14 bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-800/40 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-100 dark:group-hover:bg-red-900/60 transition-colors">
        <svg class="w-7 h-7 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="1.5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/>
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"/>
        </svg>
      </div>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Freiwillige Feuerwehr</h2>
      <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
        Ab dem <strong class="text-zinc-900 dark:text-white">17. Lebensjahr</strong> bist du Teil
        der aktiven Abteilung –
        selbstverständlich sind Frauen und Männer gleichermaßen herzlich willkommen.
        Mit Vollendung des 67. Lebensjahres (auf Antrag auch früher) kann man in die Ehrenabteilung
        wechseln.
      </p>
      <ul class="space-y-2 text-sm text-zinc-700 dark:text-zinc-300 mb-8">
        @foreach(['Ehrenamtliches Engagement', 'Umfangreiche Ausbildung', 'Kameradschaft &
        Gemeinschaft', 'Modernste Ausrüstung'] as $feat)
        <li class="flex items-center gap-2">
          <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
          </svg>
          {{ $feat }}
        </li>
        @endforeach
      </ul>
      <a href="{{ route('kontakt') }}"
         class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors w-full justify-center">
        Interesse anmelden
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>
    </div>

    {{-- Jugendfeuerwehr --}}
    <div
        class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-amber-400 dark:hover:border-amber-700/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-1 group">
      <div
          class="w-14 h-14 bg-amber-100 dark:bg-amber-900/30 border border-amber-200 dark:border-amber-800/30 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-amber-100 dark:group-hover:bg-amber-900/50 transition-colors">
        <svg class="w-7 h-7 text-amber-600 dark:text-amber-500" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="1.5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
        </svg>
      </div>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Jugendfeuerwehr</h2>
      <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
        Jugendliche ab dem <strong class="text-zinc-900 dark:text-white">10. Lebensjahr</strong>
        können Mitglied in der
        Jugendfeuerwehr werden. Hier lernen sie spielerisch den Umgang mit feuerwehrtechnischem
        Gerät,
        Erste Hilfe und erleben Kameradschaft in den vier Löschgruppen.
      </p>
      <ul class="space-y-2 text-sm text-zinc-700 dark:text-zinc-300 mb-8">
        @foreach(['Ab 10 Jahren', 'Spaß & Teamgeist', 'Grundlagen der Feuerwehr', 'Übergang in die
        Aktive ab 17'] as $feat)
        <li class="flex items-center gap-2">
          <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
          </svg>
          {{ $feat }}
        </li>
        @endforeach
      </ul>
      <a href="{{ route('kontakt') }}"
         class="inline-flex items-center gap-2 border border-amber-500 dark:border-amber-700/60 hover:bg-amber-50 dark:hover:bg-amber-900/30 text-amber-600 dark:text-amber-400 font-semibold px-6 py-3 rounded-xl transition-colors w-full justify-center">
        Interesse anmelden
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>
    </div>
  </div>

  {{-- Förderverein --}}
  <div
      class="bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-8 text-center">
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Fördernde Mitgliedschaft</h2>
    <p class="text-zinc-600 dark:text-zinc-400 max-w-lg mx-auto leading-relaxed">
      Wer uns inaktiv unterstützen möchte, ist in unserem Förderverein herzlich willkommen.
      Jede Unterstützung hilft uns, die Feuerwehr in Merzenich zu stärken.
    </p>
  </div>
</div>

@endsection
