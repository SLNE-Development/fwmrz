@extends('layouts.app')
@section('title', 'Mitmachen | Freiwillige Feuerwehr Merzenich')
@section('description', 'Werde Mitglied der Freiwilligen Feuerwehr Merzenich oder der Jugendfeuerwehr.')

@section('content')

{{-- Page Header with photo --}}
<div class="relative bg-zinc-900 border-b border-zinc-800 pt-12 pb-10 overflow-hidden">
  {{-- Background photo placeholder --}}
  <div class="absolute inset-0">
    <img src="/images/mitmachen/gruppe.jpg" alt="Gruppenübung"
         onerror="this.style.display='none'"
         class="w-full h-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-r from-zinc-900 via-zinc-900/80 to-zinc-900/40"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-400 dark:hover:border-red-700/50 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 group">
      {{-- Photo placeholder --}}
      <div class="relative h-48 bg-zinc-100 dark:bg-zinc-800">
        <img src="/images/mitmachen/aktive.jpg" alt="Aktive Einsatzkräfte"
             onerror="this.style.display='none'"
             class="w-full h-full object-cover">
        {{-- Fallback wenn kein Foto --}}
        <div class="absolute inset-0 flex flex-col items-center justify-center text-zinc-400 dark:text-zinc-600 gap-2">
          {{-- Feuerwehrhelm SVG --}}
          <svg class="w-16 h-16 opacity-40" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M8 42 C8 30 16 16 32 14 C48 16 56 30 56 42" stroke-linecap="round"/>
            <path d="M4 42 H60" stroke-linecap="round"/>
            <path d="M12 42 L10 50 H54 L52 42" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M28 14 L26 6 M36 14 L38 6" stroke-linecap="round"/>
            <rect x="22" y="3" width="20" height="5" rx="2.5"/>
          </svg>
          <span class="text-xs uppercase tracking-widest font-medium opacity-60">Foto folgt</span>
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
      </div>
      <div class="p-8">
        <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Freiwillige Feuerwehr</h2>
        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
          Ab dem <strong class="text-zinc-900 dark:text-white">17. Lebensjahr</strong> bist du Teil
          der aktiven Abteilung –
          selbstverständlich sind Frauen und Männer gleichermaßen herzlich willkommen.
          Mit Vollendung des 67. Lebensjahres (auf Antrag auch früher) kann man in die Ehrenabteilung
          wechseln.
        </p>
        <ul class="space-y-2 text-sm text-zinc-700 dark:text-zinc-300 mb-8">
          @foreach(['Ehrenamtliches Engagement', 'Umfangreiche Ausbildung', 'Kameradschaft & Gemeinschaft', 'Modernste Ausrüstung'] as $feat)
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
            {{ $feat }}
          </li>
          @endforeach
        </ul>
        <a href="{{ route('kontakt') }}"
           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors w-full justify-center">
          Interesse anmelden
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>
    </div>

    {{-- Jugendfeuerwehr --}}
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-amber-400 dark:hover:border-amber-700/50 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 group">
      {{-- Photo placeholder --}}
      <div class="relative h-48 bg-zinc-100 dark:bg-zinc-800">
        <img src="/images/mitmachen/jugend.jpg" alt="Jugendfeuerwehr"
             onerror="this.style.display='none'"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-zinc-400 dark:text-zinc-600 gap-2">
          {{-- Jugend-Icon: Stern + Wasser --}}
          <svg class="w-16 h-16 opacity-40" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="32" cy="20" r="9"/>
            <path d="M32 31 C20 31 12 38 12 48 H52 C52 38 44 31 32 31Z" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M20 52 C20 48 24 46 24 42" stroke-linecap="round"/>
            <path d="M32 52 C32 48 36 46 36 42" stroke-linecap="round"/>
            <path d="M44 52 C44 48 48 46 48 42" stroke-linecap="round"/>
          </svg>
          <span class="text-xs uppercase tracking-widest font-medium opacity-60">Foto folgt</span>
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
      </div>
      <div class="p-8">
        <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Jugendfeuerwehr</h2>
        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
          Jugendliche ab dem <strong class="text-zinc-900 dark:text-white">10. Lebensjahr</strong>
          können Mitglied in der
          Jugendfeuerwehr werden. Hier lernen sie spielerisch den Umgang mit feuerwehrtechnischem
          Gerät, Erste Hilfe und erleben Kameradschaft in den vier Löschgruppen.
        </p>
        <ul class="space-y-2 text-sm text-zinc-700 dark:text-zinc-300 mb-8">
          @foreach(['Ab 10 Jahren', 'Spaß & Teamgeist', 'Grundlagen der Feuerwehr', 'Übergang in die Aktive ab 17'] as $feat)
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
            {{ $feat }}
          </li>
          @endforeach
        </ul>
        <a href="{{ route('kontakt') }}"
           class="inline-flex items-center gap-2 border border-amber-500 dark:border-amber-700/60 hover:bg-amber-50 dark:hover:bg-amber-900/30 text-amber-600 dark:text-amber-400 font-semibold px-6 py-3 rounded-xl transition-colors w-full justify-center">
          Interesse anmelden
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>
    </div>
  </div>

  {{-- Teamfoto Platzhalter --}}
  <div class="relative rounded-2xl overflow-hidden h-64 bg-zinc-100 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-800">
    <img src="/images/mitmachen/teamfoto.jpg" alt="Alle Kameradinnen und Kameraden"
         onerror="this.style.display='none'"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-zinc-400 dark:text-zinc-600 gap-3">
      <svg class="w-12 h-12 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
      </svg>
      <span class="text-sm font-medium opacity-50">Gruppenfotos können hier eingefügt werden</span>
      <span class="text-xs opacity-40">→ /public/images/mitmachen/teamfoto.jpg</span>
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent flex items-end p-6">
      <p class="text-white font-semibold text-lg opacity-0" style="text-shadow:0 1px 3px rgba(0,0,0,.6)">Alle Kameradinnen und Kameraden</p>
    </div>
  </div>

  {{-- Förderverein --}}
  <div class="bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-8 text-center">
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Fördernde Mitgliedschaft</h2>
    <p class="text-zinc-600 dark:text-zinc-400 max-w-lg mx-auto leading-relaxed">
      Wer uns inaktiv unterstützen möchte, ist in unserem Förderverein herzlich willkommen.
      Jede Unterstützung hilft uns, die Feuerwehr in Merzenich zu stärken.
    </p>
  </div>
</div>

@endsection
