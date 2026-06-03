@extends('layouts.app')

@section('title', 'Einsätze | Freiwillige Feuerwehr Merzenich')
@section('description', 'Alle Einsätze der Freiwilligen Feuerwehr Merzenich mit ausführlichen Berichten.')

@section('content')

{{-- Page Header --}}
<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span>
      <span class="text-zinc-300">Einsätze</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Einsätze</h1>
    <p class="text-zinc-400 max-w-2xl">
      Auf unserer Internetseite berichten wir ausführlich (inkl. Bild- und Videomaterial) über
      unsere Einsätze.
      Bild- und Videoaufnahmen werden erst gemacht, wenn das Einsatzgeschehen dies zulässt.
    </p>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

  {{-- Filter info --}}
  @if($commitments->total() > 0)
  <p class="text-sm text-zinc-500 mb-8">{{ number_format($commitments->total()) }} Einsätze
    gefunden</p>
  @endif

  {{-- Grid --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($commitments as $commitment)
    <a href="{{ route('einsaetze.show', $commitment->slug) }}"
       class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-400 dark:hover:border-red-700/60 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-red-100 dark:hover:shadow-red-950/20 flex flex-col">

      {{-- Thumbnail / Gradient --}}
      @if($commitment->hasMedia('thumbnail'))
      <div class="relative w-full aspect-video overflow-hidden">
        <img src="{{ $commitment->getFirstMediaUrl('thumbnail') }}"
             alt="{{ $commitment->title }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent"></div>
      </div>
      @else
      <div class="relative w-full aspect-video overflow-hidden">
        <div
            class="w-full h-full bg-gradient-to-br from-red-950/60 via-zinc-900 to-zinc-800 flex items-center justify-center">
          <svg class="w-10 h-10 text-red-800/50" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.047 8.287 8.287 0 009 9.601a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"/>
          </svg>
        </div>
      </div>
      @endif

      <div class="p-5 flex flex-col flex-1">
        <div class="flex items-start justify-between gap-3 mb-3">
          @if($commitment->type)
          <span
              class="shrink-0 inline-flex items-center bg-red-900/20 border border-red-800/40 text-red-400 text-xs font-bold px-2 py-0.5 rounded uppercase tracking-wide">
                        {{ $commitment->type->short }}
                    </span>
          @endif
          <span
              class="text-xs text-zinc-500 shrink-0">{{ $commitment->start->format('d.m.Y') }}</span>
        </div>
        <h2 class="text-base font-bold text-zinc-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors mb-1 line-clamp-2">
          {{ $commitment->title }}
        </h2>
        @if($commitment->type)
        <p class="text-xs text-zinc-500 mb-3">{{ $commitment->type->name }}</p>
        @endif
        @if($commitment->body)
        <p class="text-sm text-zinc-600 dark:text-zinc-400 line-clamp-3 flex-1">{{
          Str::limit(strip_tags($commitment->body), 120) }}</p>
        @endif
        <div class="mt-4 flex items-center justify-between">
          <span class="text-xs text-zinc-600">{{ $commitment->start->format('H:i') }} Uhr</span>
          <span
              class="text-xs text-red-600 dark:text-red-400 font-medium group-hover:gap-2 flex items-center gap-1.5 transition-all">
                        Mehr erfahren
                        <svg class="w-3 h-3 transition-transform group-hover:translate-x-0.5"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
        </div>
      </div>
    </a>
    @empty
    <div class="col-span-full text-center py-20 text-zinc-500">
      <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" viewBox="0 0 24 24"
           stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126z"/>
      </svg>
      Keine Einsätze veröffentlicht.
    </div>
    @endforelse
  </div>

  {{-- Pagination --}}
  @if($commitments->hasPages())
  <div class="mt-12 flex justify-center">
    {{ $commitments->links('vendor.pagination.custom') }}
  </div>
  @endif
</div>

@endsection

