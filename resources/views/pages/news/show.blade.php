@extends('layouts.app')

@section('title', $news->title . ' | Freiwillige Feuerwehr Merzenich')
@section('description', Str::limit(strip_tags($news->body ?? ''), 160))

@section('content')

<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-4 uppercase tracking-wider flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
            <span>›</span>
            <a href="{{ route('news.index') }}" class="hover:text-red-400 transition-colors">Aktuelles</a>
            <span>›</span>
            <span class="text-zinc-300 line-clamp-1">{{ $news->title }}</span>
        </div>
        <p class="text-sm text-zinc-500 mb-3">
            <time datetime="{{ $news->created_at->toIso8601String() }}">{{ $news->created_at->format('d. F Y') }}</time>
            @if($news->author)
             · {{ $news->author->name }}
            @endif
        </p>
        <h1 class="text-3xl sm:text-4xl font-bold text-white leading-tight">{{ $news->title }}</h1>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    @if($news->hasMedia('thumbnail'))
    <figure class="mb-10 rounded-2xl overflow-hidden border border-zinc-800">
        <img src="{{ $news->getFirstMediaUrl('thumbnail') }}"
             alt="{{ $news->title }}"
             class="w-full object-cover max-h-[28rem]">
    </figure>
    @endif

    @if($news->body)
    <div class="prose prose-invert prose-zinc prose-p:text-zinc-300 prose-headings:text-white prose-a:text-red-400 max-w-none mb-12 text-base leading-relaxed">
        {!! nl2br(e($news->body)) !!}
    </div>
    @endif

    @if($news->hasMedia('gallery'))
    <div class="mb-12">
        <h2 class="text-lg font-bold text-white mb-4">Bilder</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach($news->getMedia('gallery') as $media)
            <a href="{{ $media->getUrl() }}" target="_blank"
               class="block rounded-xl overflow-hidden border border-zinc-800 hover:border-red-700 transition-colors aspect-video">
                <img src="{{ $media->getUrl('thumb') ?: $media->getUrl() }}"
                     alt="{{ $news->title }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </a>
            @endforeach
        </div>
    </div>
    @endif

    <div class="flex justify-between pt-8 border-t border-zinc-800">
        <a href="{{ route('news.index') }}"
           class="inline-flex items-center gap-2 text-zinc-400 hover:text-red-400 text-sm transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            Alle Neuigkeiten
        </a>
    </div>
</div>

@endsection

