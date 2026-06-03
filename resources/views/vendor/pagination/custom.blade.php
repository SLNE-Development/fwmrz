@if ($paginator->hasPages())
<nav class="flex items-center justify-center gap-1 flex-wrap">
    {{-- Previous --}}
    @if ($paginator->onFirstPage())
    <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-zinc-600 cursor-not-allowed text-sm">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
       class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-zinc-700 hover:border-red-600 text-zinc-400 hover:text-red-400 transition-colors text-sm">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
    </a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
        @if (is_string($element))
        <span class="inline-flex items-center justify-center w-9 h-9 text-zinc-600 text-sm">…</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-600 text-white font-semibold text-sm">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
               class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-zinc-700 hover:border-red-600 text-zinc-400 hover:text-red-400 transition-colors text-sm">
                {{ $page }}
            </a>
            @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
       class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-zinc-700 hover:border-red-600 text-zinc-400 hover:text-red-400 transition-colors text-sm">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
    </a>
    @else
    <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-zinc-600 cursor-not-allowed text-sm">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
    </span>
    @endif
</nav>
@endif

