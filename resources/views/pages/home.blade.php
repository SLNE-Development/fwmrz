@extends('layouts.app')

@section('title', 'Startseite | Freiwillige Feuerwehr Merzenich')
@section('content')

{{-- HERO --}}
<section class="relative min-h-[88vh] flex items-center overflow-hidden bg-zinc-950">

  {{-- Background photo --}}
  <div class="absolute inset-0">
    <img src="/images/hero/hero.jpg"
         alt="Feuerwehr Merzenich im Einsatz"
         class="w-full h-full object-cover object-center opacity-50">
    {{-- Gradient overlay: strong on left for text legibility, fades right --}}
    <div
        class="absolute inset-0 bg-gradient-to-r from-zinc-950/95 via-zinc-950/70 to-zinc-950/20"></div>
    <div
        class="absolute inset-0 bg-gradient-to-t from-zinc-950/60 via-transparent to-transparent"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 lg:py-36 w-full">
    <div class="max-w-2xl">
      <!--            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">-->
      <!--                <span class="w-2 h-2 rounded-full bg-red-400 inline-block animate-pulse"></span>-->
      <!--                Freiwillige Feuerwehr · Gemeinde Merzenich-->
      <!--            </div>-->
      <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight tracking-tight text-white mb-6">
        Wir schützen<br><span class="text-red-400">Merzenich</span>.
      </h1>
      <p class="text-lg sm:text-xl text-zinc-300 leading-relaxed mb-10 max-w-xl">
        Vier Löschgruppen, rund 100 ehrenamtliche Kameradinnen und Kameraden – rund um die Uhr
        bereit für die Gemeinde Merzenich.
      </p>
      <div class="flex flex-wrap gap-4">
        <a href="{{ route('einsaetze.index') }}"
           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-7 py-3.5 rounded-lg transition-all duration-200 shadow-lg shadow-red-900/40 hover:-translate-y-0.5">
          {{-- Fire truck icon --}}
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
          </svg>
          Einsätze ansehen
        </a>
        <a href="{{ route('mitmachen') }}"
           class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 hover:border-white/50 text-white font-semibold px-7 py-3.5 rounded-lg transition-all duration-200 hover:-translate-y-0.5">
          Mitmachen
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>
    </div>
  </div>

  {{-- Scroll hint --}}
  <div
      class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
    <div class="w-5 h-8 border-2 border-white/40 rounded-full flex items-start justify-center p-1">
      <div class="w-1 h-2 bg-white/60 rounded-full animate-bounce"></div>
    </div>
  </div>
</section>

{{-- STATS --}}
<section class="border-y border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900/50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div
        class="grid grid-cols-2 lg:grid-cols-5 gap-8 text-center items-center justify-center justify-items-center">
      @foreach([
      ['value'=>'~100', 'label'=>'Aktive Kameraden'],
      ['value'=>'4', 'label'=>'Löschgruppen'],
      ['value'=>'~30', 'label'=>'Jugendfeuerwehr'],
      ['value'=>'~20', 'label'=>'Kinderfeuerwehr'],
      ['value'=>'112', 'label'=>'Notruf'],
      ] as $s)
      <div>
        <div class="text-3xl sm:text-4xl font-bold text-red-600 dark:text-red-500 mb-1">{{
          $s['value'] }}
        </div>
        <div class="text-sm text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">{{
          $s['label'] }}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- LATEST --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
  <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">
    <div class="lg:col-span-2">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-zinc-900 dark:text-white">Letzter Einsatz</h2>
        <a href="{{ route('einsaetze.index') }}"
           class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors inline-flex items-center gap-1">Alle
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>
      @if($latestCommitment)
      <a href="{{ route('einsaetze.show', $latestCommitment->slug) }}"
         class="group block bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-red-100 dark:hover:shadow-red-950/30">
        <div class="flex items-start justify-between mb-3">
          @if($latestCommitment->type)
          <span
              class="inline-block bg-red-100 dark:bg-red-900/50 border border-red-200 dark:border-red-800/50 text-red-600 dark:text-red-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">{{ $latestCommitment->type->short }}</span>
          @endif
          <span class="text-xs text-zinc-400 dark:text-zinc-500">{{ $latestCommitment->start->format('d.m.Y · H:i') }} Uhr</span>
        </div>
        <h3 class="text-lg font-bold text-zinc-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors mb-1">
          {{ $latestCommitment->title }}</h3>
        @if($latestCommitment->type)<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">{{
          $latestCommitment->type->name }}</p>@endif
        @if($latestCommitment->body)<p
            class="text-sm text-zinc-500 dark:text-zinc-500 leading-relaxed line-clamp-3">{{
          Str::limit(strip_tags($latestCommitment->body), 140) }}</p>@endif
        <div
            class="mt-4 text-sm text-red-600 dark:text-red-400 font-medium flex items-center gap-2">
          Mehr erfahren
          <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </div>
      </a>
      @else
      <div
          class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6 text-zinc-400 text-sm">
        Noch keine Einsätze veröffentlicht.
      </div>
      @endif
    </div>
    <div class="lg:col-span-3">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-zinc-900 dark:text-white">Aktuelles</h2>
        <a href="{{ route('news.index') }}"
           class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors inline-flex items-center gap-1">Alle
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>
      <div class="flex flex-col gap-4">
        @forelse($latestNews as $item)
        <a href="{{ route('news.show', $item->slug) }}"
           class="group flex gap-4 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-800 rounded-xl p-4 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:shadow-red-50 dark:hover:shadow-red-950/20">
          <div class="shrink-0 w-1 rounded-full bg-red-600"></div>
          <div class="min-w-0 flex-1">
            <p class="text-xs text-zinc-400 dark:text-zinc-500 mb-1">{{
              $item->created_at->format('d.m.Y') }}</p>
            <h3 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors line-clamp-2">
              {{ $item->title }}</h3>
            @if($item->body)<p class="text-xs text-zinc-500 dark:text-zinc-500 mt-1 line-clamp-2">{{
              Str::limit(strip_tags($item->body), 100) }}</p>@endif
          </div>
          <svg
              class="shrink-0 w-4 h-4 text-zinc-300 dark:text-zinc-600 group-hover:text-red-500 dark:group-hover:text-red-400 transition-colors self-center"
              fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
        @empty
        <div
            class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl p-4 text-zinc-400 text-sm">
          Noch keine Neuigkeiten veröffentlicht.
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

{{-- FAHRZEUGE --}}
<section class="border-y border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950 py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10">
      <span class="text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest">Fahrzeuge</span>
      <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mt-1 mb-2">Unsere
        Fahrzeuge</h2>
      <p class="text-zinc-500 dark:text-zinc-400 max-w-xl">Ein kleiner Einblick in unsere
        Fahrzeugflotte – von der Brandbekämpfung bis zur Technischen Hilfeleistung.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      @php
      $fahrzeuge = [
      ['name' => 'HLF 20-01', 'sub' => 'Hilfeleistungslöschfahrzeug', 'lg' => 'LG Merzenich', 'img'
      =>
      '/images/fahrzeuge/hlf20-01.jpg'],
      ['name' => 'HLF 20-02', 'sub' => 'Hilfeleistungslöschfahrzeug', 'lg' => 'LG Golzheim', 'img'
      =>
      '/images/fahrzeuge/hlf20-02.jpg'],
      ['name' => 'TLF 4000-01', 'sub' => 'Tanklöschfahrzeug', 'lg' => 'LG Merzenich', 'img' =>
      '/images/fahrzeuge/tlf4000.jpg'],
      ];
      @endphp

      @foreach($fahrzeuge as $fz)
      <div
          class="group bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-800 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-red-100 dark:hover:shadow-red-950/20">
        {{-- Fahrzeugbild --}}
        <div class="relative aspect-[16/9] overflow-hidden bg-zinc-200 dark:bg-zinc-800">
          <img src="{{ $fz['img'] }}"
               alt="{{ $fz['name'] }}"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        </div>
        <div class="p-5">
          <div class="flex items-start justify-between gap-2">
            <div>
              <h3 class="font-bold text-zinc-900 dark:text-white text-base">{{ $fz['name'] }}</h3>
              <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $fz['sub'] }}</p>
            </div>
            <span
                class="shrink-0 text-xs text-zinc-400 dark:text-zinc-500 bg-zinc-100 dark:bg-zinc-800 px-2 py-0.5 rounded-md">{{ $fz['lg'] }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- LÖSCHGRUPPEN --}}
<section class="bg-zinc-50 dark:bg-zinc-900/40 border-b border-zinc-200 dark:border-zinc-800 py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-3">Unsere
        Löschgruppen</h2>
      <p class="text-zinc-500 dark:text-zinc-400 max-w-xl mx-auto">In Merzenich, Golzheim,
        Morschenich und Girbelsrath – vier Einheiten, eine Wehr.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach([
      ['name' => 'Merzenich'],
      ['name' => 'Golzheim'],
      ['name' => 'Morschenich'],
      ['name' => 'Girbelsrath'],
      ] as $lg)
      <div
          class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-700/50 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 group">
        {{-- Feuerwehrhelm-Icon --}}
        <div
            class="w-12 h-12 bg-red-50 dark:bg-red-900/30 border border-red-100 dark:border-red-900/40 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-7 h-7 text-red-600 dark:text-red-500" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3C8 3 4.5 6 4 10H3a1 1 0 00-1 1v1a1 1 0 001 1h18a1 1 0 001-1v-1a1 1 0 00-1-1h-1C19.5 6 16 3 12 3z"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 13v1a2 2 0 002 2h10a2 2 0 002-2v-1"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13h18"/>
          </svg>
        </div>
        <h3 class="font-bold text-zinc-900 dark:text-white text-lg mb-0.5">LG {{ $lg['name'] }}</h3>
        <div class="flex flex-col gap-1">
          <div class="flex items-center gap-2 text-xs text-zinc-600 dark:text-zinc-400">
            <span class="w-1.5 h-1.5 rounded-full bg-red-500 shrink-0"></span>Aktive Abteilung
          </div>
          <div class="flex items-center gap-2 text-xs text-zinc-600 dark:text-zinc-400">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0"></span>Jugendfeuerwehr
          </div>
          <div class="flex items-center gap-2 text-xs text-zinc-600 dark:text-zinc-400">
            <span class="w-1.5 h-1.5 rounded-full bg-zinc-400 shrink-0"></span>Ehrenabteilung
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <div class="relative overflow-hidden rounded-3xl">
    {{-- Background photo with overlay --}}
    <div class="absolute inset-0">
      <img src="/images/hero/hero.jpg"
           alt=""
           class="w-full h-full object-cover object-center"
           aria-hidden="true">
      <div class="absolute inset-0 bg-zinc-900/85"></div>
    </div>
    <div class="relative px-8 sm:px-14 py-16 text-center">
      <span class="inline-block text-xs text-red-400 font-semibold uppercase tracking-widest mb-4">Ehrenamt</span>
      <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Jetzt Mitglied werden</h2>
      <p class="text-zinc-300 max-w-lg mx-auto mb-8 leading-relaxed">Kinderfeuerwehr ab 6 Jahren,
        Jugendfeuerwehr ab 10 und aktiver Dienst ab 17 – wir freuen uns über jede Verstärkung.</p>
      <a href="{{ route('mitmachen') }}"
         class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-xl text-base transition-all duration-200 shadow-lg shadow-red-900/40 hover:-translate-y-0.5">
        Jetzt Mitmachen
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>
    </div>
  </div>
</section>
@endsection

