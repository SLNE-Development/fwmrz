@extends('layouts.app')

@section('title', $commitment->title . ' | Einsätze | Freiwillige Feuerwehr Merzenich')
@section('description', Str::limit(strip_tags($commitment->body ?? ''), 160) ?: 'Einsatzbericht der Freiwilligen Feuerwehr Merzenich.')
@section('canonical', route('einsaetze.show', $commitment->slug))
@section('og_type', 'article')
@section('og_title', $commitment->title . ' | Freiwillige Feuerwehr Merzenich')
@section('og_description', Str::limit(strip_tags($commitment->body ?? ''), 160) ?: 'Einsatzbericht der Freiwilligen Feuerwehr Merzenich.')
@section('og_image', $commitment->hasMedia('thumbnail') ? $commitment->getFirstMediaUrl('thumbnail') : asset('images/hero/hero.jpg'))

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": {{ Js::from($commitment->title) }},
  "description": {{ Js::from(Str::limit(strip_tags($commitment->body ?? ''), 160)) }},
  "datePublished": "{{ $commitment->start->toIso8601String() }}",
  "dateModified": "{{ $commitment->updated_at->toIso8601String() }}",
  "image": "{{ $commitment->hasMedia('thumbnail') ? $commitment->getFirstMediaUrl('thumbnail') : asset('images/hero/hero.jpg') }}",
  "url": "{{ route('einsaetze.show', $commitment->slug) }}",
  "publisher": {
    "@type": "Organization",
    "name": "Freiwillige Feuerwehr Merzenich",
    "url": "{{ url('/') }}"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type":"ListItem","position":1,"name":"Startseite","item":"{{ url('/') }}"},
      {"@type":"ListItem","position":2,"name":"Einsätze","item":"{{ route('einsaetze.index') }}"},
      {"@type":"ListItem","position":3,"name": {{ Js::from($commitment->title) }} ,"item":"{{ route('einsaetze.show', $commitment->slug) }}"}
    ]
  }
}
</script>
@endsection

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
    <div class="rich-content text-zinc-700 dark:text-zinc-300 max-w-none mb-12">
        {!! $commitment->body !!}
    </div>
    @endif

    {{-- Gallery --}}
    @if($commitment->hasMedia('gallery'))
    <div class="mb-12" x-data="{
        open: false,
        current: '',
        currentIndex: 0,
        images: {{ json_encode($commitment->getMedia('gallery')->map(fn($m) => $m->getUrl())->values()) }},
        show(url, idx) { this.current = url; this.currentIndex = idx; this.open = true; },
        prev() { this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length; this.current = this.images[this.currentIndex]; },
        next() { this.currentIndex = (this.currentIndex + 1) % this.images.length; this.current = this.images[this.currentIndex]; },
    }" @keydown.escape.window="open = false" @keydown.arrow-left.window="if(open) prev()" @keydown.arrow-right.window="if(open) next()">
        <h2 class="text-lg font-bold text-white mb-4">Bilder</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($commitment->getMedia('gallery') as $i => $media)
            <button @click="show('{{ $media->getUrl() }}', {{ $i }})"
                    class="block rounded-xl overflow-hidden border border-zinc-800 hover:border-red-700 transition-colors aspect-video w-full cursor-zoom-in">
                <img src="{{ $media->getUrl() }}"
                     alt="{{ $commitment->title }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </button>
            @endforeach
        </div>

        {{-- Lightbox --}}
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm"
             @click.self="open = false">
            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white bg-zinc-800/60 hover:bg-zinc-700 rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <img :src="current" class="max-h-[90vh] max-w-[90vw] object-contain rounded-xl shadow-2xl" alt="">
            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white bg-zinc-800/60 hover:bg-zinc-700 rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            <button @click="open = false" class="absolute top-4 right-4 text-white/70 hover:text-white bg-zinc-800/60 hover:bg-zinc-700 rounded-full p-2 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/50 text-sm" x-text="(currentIndex + 1) + ' / ' + images.length"></div>
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

