@extends('layouts.app')

@section('title', 'Startseite | Freiwillige Feuerwehr Merzenich')
@section('content')

{{-- HERO --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden bg-zinc-100 dark:bg-zinc-950">
    <div class="absolute inset-0 bg-gradient-to-br from-red-100/80 via-transparent to-transparent dark:from-red-950/60 dark:via-zinc-950 dark:to-zinc-950 pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_20%_50%,rgba(220,38,38,0.08),transparent)] dark:bg-[radial-gradient(ellipse_80%_60%_at_20%_50%,rgba(220,38,38,0.15),transparent)] pointer-events-none"></div>
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image:linear-gradient(rgba(0,0,0,.15) 1px,transparent 1px),linear-gradient(90deg,rgba(0,0,0,.15) 1px,transparent 1px);background-size:64px 64px"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-800/50 text-red-600 dark:text-red-400 text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-red-500 inline-block animate-pulse"></span>
                Freiwillige Feuerwehr · Gemeinde Merzenich
            </div>
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight tracking-tight text-zinc-900 dark:text-white mb-6 animate-fade-in-up animate-delay-100">
                Wir schützen<br><span class="text-red-600 dark:text-red-500">Merzenich</span>
            </h1>
            <p class="text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 leading-relaxed mb-10 max-w-xl animate-fade-in-up animate-delay-200">
                Vier Löschgruppen, rund 100 ehrenamtliche Kameradinnen und Kameraden – jederzeit bereit für Euch.
            </p>
            <div class="flex flex-wrap gap-4 animate-fade-in-up animate-delay-300">
                <a href="{{ route('einsaetze.index') }}"
                   class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-7 py-3.5 rounded-lg transition-all duration-200 shadow-lg shadow-red-200 dark:shadow-red-900/30 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                    Einsätze ansehen
                </a>
                <a href="{{ route('mitmachen') }}"
                   class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-600 hover:border-red-500 text-zinc-700 dark:text-zinc-200 hover:text-red-600 dark:hover:text-red-400 font-semibold px-7 py-3.5 rounded-lg transition-all duration-200 hover:-translate-y-0.5">
                    Mitmachen <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-30">
        <span class="text-xs text-zinc-500 uppercase tracking-widest">Scroll</span>
        <div class="w-px h-10 bg-gradient-to-b from-zinc-400 to-transparent"></div>
    </div>
</section>

{{-- STATS --}}
<section class="border-y border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach([['value'=>'~100','label'=>'Aktive Kameraden'],['value'=>'4','label'=>'Löschgruppen'],['value'=>'~30','label'=>'Jugendfeuerwehr'],['value'=>'112','label'=>'Notruf']] as $s)
            <div>
                <div class="text-3xl sm:text-4xl font-bold text-red-600 dark:text-red-500 mb-1">{{ $s['value'] }}</div>
                <div class="text-sm text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">{{ $s['label'] }}</div>
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
                <a href="{{ route('einsaetze.index') }}" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors inline-flex items-center gap-1">Alle <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
            </div>
            @if($latestCommitment)
            <a href="{{ route('einsaetze.show', $latestCommitment->slug) }}"
               class="group block bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-red-100 dark:hover:shadow-red-950/30">
                <div class="flex items-start justify-between mb-3">
                    @if($latestCommitment->type)
                    <span class="inline-block bg-red-100 dark:bg-red-900/50 border border-red-200 dark:border-red-800/50 text-red-600 dark:text-red-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">{{ $latestCommitment->type->short }}</span>
                    @endif
                    <span class="text-xs text-zinc-400 dark:text-zinc-500">{{ $latestCommitment->start->format('d.m.Y · H:i') }} Uhr</span>
                </div>
                <h3 class="text-lg font-bold text-zinc-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors mb-1">{{ $latestCommitment->title }}</h3>
                @if($latestCommitment->type)<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">{{ $latestCommitment->type->name }}</p>@endif
                @if($latestCommitment->body)<p class="text-sm text-zinc-500 dark:text-zinc-500 leading-relaxed line-clamp-3">{{ Str::limit(strip_tags($latestCommitment->body), 140) }}</p>@endif
                <div class="mt-4 text-sm text-red-600 dark:text-red-400 font-medium flex items-center gap-2">Mehr erfahren <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></div>
            </a>
            @else
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6 text-zinc-400 text-sm">Noch keine Einsätze veröffentlicht.</div>
            @endif
        </div>
        <div class="lg:col-span-3">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-zinc-900 dark:text-white">Aktuelles</h2>
                <a href="{{ route('news.index') }}" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors inline-flex items-center gap-1">Alle <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
            </div>
            <div class="flex flex-col gap-4">
                @forelse($latestNews as $item)
                <a href="{{ route('news.show', $item->slug) }}"
                   class="group flex gap-4 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-800 rounded-xl p-4 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:shadow-red-50 dark:hover:shadow-red-950/20">
                    <div class="shrink-0 w-1 rounded-full bg-red-600 dark:bg-red-600"></div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-zinc-400 dark:text-zinc-500 mb-1">{{ $item->created_at->format('d.m.Y') }}</p>
                        <h3 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors line-clamp-2">{{ $item->title }}</h3>
                        @if($item->body)<p class="text-xs text-zinc-500 dark:text-zinc-500 mt-1 line-clamp-2">{{ Str::limit(strip_tags($item->body), 100) }}</p>@endif
                    </div>
                    <svg class="shrink-0 w-4 h-4 text-zinc-300 dark:text-zinc-600 group-hover:text-red-500 dark:group-hover:text-red-400 transition-colors self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                @empty
                <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl p-4 text-zinc-400 text-sm">Noch keine Neuigkeiten veröffentlicht.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- LÖSCHGRUPPEN --}}
<section class="bg-zinc-50 dark:bg-zinc-900/40 border-y border-zinc-200 dark:border-zinc-800 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-3">Unsere Löschgruppen</h2>
            <p class="text-zinc-500 dark:text-zinc-400 max-w-xl mx-auto">Vier Einheiten in der Gemeinde Merzenich – stets einsatzbereit.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(['Merzenich','Golzheim','Morschenich','Girbelsrath'] as $lg)
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-700/50 rounded-2xl p-6 text-center transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-red-50 dark:bg-red-900/40 border border-red-200 dark:border-red-800/40 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"/></svg>
                </div>
                <h3 class="font-bold text-zinc-900 dark:text-white text-lg">LG {{ $lg }}</h3>
                <p class="text-xs text-zinc-400 dark:text-zinc-500 mt-1">Aktive · Jugendfeuerwehr · Ehrenabteilung</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 to-red-800 dark:from-red-900/60 dark:to-zinc-900 border border-red-500 dark:border-red-800/40 rounded-3xl px-8 sm:px-14 py-16 text-center">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_60%_at_50%_50%,rgba(255,255,255,0.05),transparent)] pointer-events-none"></div>
        <div class="relative">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Werde Teil unserer Gemeinschaft</h2>
            <p class="text-red-100 dark:text-zinc-300 max-w-lg mx-auto mb-8 leading-relaxed">Ab dem 10. Lebensjahr in der Jugendfeuerwehr – ab 17 in der aktiven Abteilung. Jeder ist willkommen!</p>
            <a href="{{ route('mitmachen') }}"
               class="inline-flex items-center gap-2 bg-white hover:bg-zinc-100 text-red-600 font-bold px-8 py-4 rounded-xl text-lg transition-all duration-200 shadow-xl hover:-translate-y-0.5">
                Jetzt Mitmachen <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection

