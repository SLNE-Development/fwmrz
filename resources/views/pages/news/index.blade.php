@extends('layouts.app')

@section('title', 'Aktuelles | Freiwillige Feuerwehr Merzenich')
@section('description', 'Neuigkeiten und Berichte der Freiwilligen Feuerwehr Merzenich.')

@section('content')

<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span>
      <span class="text-zinc-300">Aktuelles</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Aktuelles</h1>
    <p class="text-zinc-400">Neuigkeiten aus der Feuerwehr Merzenich – Lehrgänge, Fahrzeugübergaben, Veranstaltungen.</p>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

  {{-- Year switcher + count --}}
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    @if($news->total() > 0)
    <p class="text-sm text-zinc-500">{{ number_format($news->total()) }} Beiträge in {{ $selectedYear }}</p>
    @else
    <p class="text-sm text-zinc-500">Keine Beiträge in {{ $selectedYear }}</p>
    @endif

    @if($years->count() > 0)
    <div class="flex items-center gap-1 flex-wrap">
      @foreach($years as $year)
      <a href="{{ route('news.index', ['year' => $year]) }}"
         class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors
                {{ $year == $selectedYear
                   ? 'bg-red-600 text-white'
                   : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-700' }}">
        {{ $year }}
      </a>
      @endforeach
    </div>
    @endif
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($news as $item)
    <a href="{{ route('news.show', $item->slug) }}"
       class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-400 dark:hover:border-red-700/60 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-red-100 dark:hover:shadow-red-950/20 flex flex-col">

      @if($item->hasMedia('thumbnail'))
      <div class="aspect-video overflow-hidden">
        <img src="{{ $item->getFirstMediaUrl('thumbnail') }}"
             alt="{{ $item->title }}"
             class="w-full h-full object-cover">
      </div>
      @else
      <div
          class="aspect-video bg-gradient-to-br from-red-950/40 to-zinc-900 dark:from-red-950/40 dark:to-zinc-900 flex items-center justify-center">
        <svg class="w-10 h-10 text-red-900/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="1">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/>
        </svg>
      </div>
      @endif

      <div class="p-5 flex flex-col flex-1">
        <p class="text-xs text-zinc-500 mb-2">{{ $item->created_at->format('d.m.Y') }}</p>
        <h2 class="text-base font-bold text-zinc-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors mb-2 line-clamp-2 flex-1">
          {{ $item->title }}
        </h2>
        @if($item->body)
        <p class="text-sm text-zinc-600 dark:text-zinc-400 line-clamp-3">{{
          Str::limit(strip_tags($item->body), 120) }}</p>
        @endif
        <div
            class="mt-4 text-xs text-red-600 dark:text-red-400 font-medium flex items-center gap-1.5">
          Weiterlesen
          <svg class="w-3 h-3 transition-transform group-hover:translate-x-0.5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </div>
      </div>
    </a>
    @empty
    <div class="col-span-full text-center py-20 text-zinc-500">
      Noch keine Neuigkeiten veröffentlicht.
    </div>
    @endforelse
  </div>

  @if($news->hasPages())
  <div class="mt-12 flex justify-center">
    {{ $news->links('vendor.pagination.custom') }}
  </div>
  @endif
</div>

@endsection

