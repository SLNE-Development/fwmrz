@extends('layouts.app')

@section('title', $commitment->title . ' | Einsätze | Freiwillige Feuerwehr Merzenich')
@section('description', Str::limit(strip_tags($commitment->body ?? ''), 160))

@section('content')

<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-4 uppercase tracking-wider flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
            <span>›</span>
            <a href="{{ route('einsaetze.index') }}" class="hover:text-red-400 transition-colors">Einsätze</a>
            <span>›</span>
            <span class="text-zinc-300">{{ $commitment->title }}</span>
        </div>
        <div class="flex flex-wrap items-center gap-3 mb-4">
            @if($commitment->type)
            <span class="inline-flex items-center bg-red-900/50 border border-red-800/50 text-red-400 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wide">
                {{ $commitment->type->short }} – {{ $commitment->type->name }}
            </span>
            @endif
            <span class="text-sm text-zinc-500">
                <time datetime="{{ $commitment->start->toIso8601String() }}">
                    {{ $commitment->start->format('d.m.Y') }} / {{ $commitment->start->format('H:i') }} Uhr
                </time>
            </span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-bold text-white">{{ $commitment->title }}</h1>

        @if($commitment->stations->isNotEmpty())
        <div class="flex flex-wrap gap-2 mt-4">
            @foreach($commitment->stations as $station)
            <span class="inline-block bg-zinc-800 border border-zinc-700 text-zinc-300 text-xs px-2.5 py-1 rounded-lg">
                {{ $station->name }}
            </span>
            @endforeach
        </div>
        @endif
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Thumbnail --}}
    @if($commitment->hasMedia('thumbnail'))
    <figure class="mb-10 rounded-2xl overflow-hidden border border-zinc-800">
        <img src="{{ $commitment->getFirstMediaUrl('thumbnail') }}"
             alt="{{ $commitment->title }}"
             class="w-full object-cover max-h-96">
    </figure>
    @endif

    {{-- Body --}}
    @if($commitment->body)
    <div class="prose prose-invert prose-zinc prose-p:text-zinc-300 prose-headings:text-white max-w-none mb-12">
        {!! nl2br(e($commitment->body)) !!}
    </div>
    @endif

    {{-- Gallery --}}
    @if($commitment->hasMedia('gallery'))
    <div class="mb-12">
        <h2 class="text-lg font-bold text-white mb-4">Bilder</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($commitment->getMedia('gallery') as $media)
            <a href="{{ $media->getUrl() }}" target="_blank"
               class="block rounded-xl overflow-hidden border border-zinc-800 hover:border-red-700 transition-colors aspect-video">
                <img src="{{ $media->getUrl('thumb') ?: $media->getUrl() }}"
                     alt="{{ $commitment->title }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Navigation --}}
    <div class="flex justify-between pt-8 border-t border-zinc-800">
        <a href="{{ route('einsaetze.index') }}"
           class="inline-flex items-center gap-2 text-zinc-400 hover:text-red-400 text-sm transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            Alle Einsätze
        </a>
    </div>
</div>

@endsection

