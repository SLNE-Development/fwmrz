@extends('layouts.app')

@section('title', 'Organisation | Freiwillige Feuerwehr Merzenich')
@section('description', 'Die Organisation der Freiwilligen Feuerwehr Merzenich – Wehrleitung, Löschgruppen, Ausbildung und mehr.')

@section('content')

<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
            <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
            <span>›</span>
            <span class="text-zinc-300">Organisation</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Organisation</h1>
        <p class="text-zinc-400 max-w-2xl">Die Feuerwehr Merzenich ist eine freiwillige Feuerwehr, die ausschließlich aus ehrenamtlichen Kräften besteht.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">

    {{-- Wehrleitung --}}
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <span class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Führung</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-4">Wehrleitung</h2>
                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
                    Geleitet wird die Wehr durch die Wehrleitung. Diese ist unter anderem zuständig für:
                </p>
                <ul class="space-y-2">
                    @foreach(['Organisation', 'Personal', 'Fahrzeug- und Gerätetechnik', 'Ausbildungskoordination'] as $task)
                    <li class="flex items-center gap-3 text-zinc-700 dark:text-zinc-300 text-sm">
                        <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        {{ $task }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-8">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-800/40 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-zinc-900 dark:text-white">Patrick Harzheim</div>
                        <div class="text-sm text-red-600 dark:text-red-400">Wehrleiter</div>
                    </div>
                </div>
                <div class="space-y-2 text-sm text-zinc-600 dark:text-zinc-400">
                    <div class="flex items-center gap-2"><svg class="w-4 h-4 text-zinc-400 dark:text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg><a href="mailto:wehrleitung@gemeinde-merzenich.de" class="hover:text-red-500 dark:hover:text-red-400 transition-colors">wehrleitung@gemeinde-merzenich.de</a></div>
                    <div class="flex items-center gap-2"><svg class="w-4 h-4 text-zinc-400 dark:text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg><a href="tel:+4924213990" class="hover:text-red-500 dark:hover:text-red-400 transition-colors">+49 2421 399-0</a></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Löschgruppen --}}
    <section>
        <span class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Einheiten</span>
        <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-4">Unsere Löschgruppen</h2>
        <p class="text-zinc-600 dark:text-zinc-400 max-w-2xl mb-8">Innerhalb unserer Gemeinde gibt es 4 Löschgruppen in Merzenich, Golzheim, Morschenich und Girbelsrath.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(['Merzenich', 'Golzheim', 'Morschenich', 'Girbelsrath'] as $lg)
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6">
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-900/30 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/></svg>
                </div>
                <h3 class="font-bold text-zinc-900 dark:text-white mb-3">LG {{ $lg }}</h3>
                <ul class="space-y-1.5 text-sm text-zinc-600 dark:text-zinc-400">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-red-500 shrink-0"></span>Aktive Abteilung</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0"></span>Jugendfeuerwehr</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-400 shrink-0"></span>Ehrenabteilung</li>
                </ul>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Mitglieder Zahlen --}}
    <section class="bg-zinc-50 dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 rounded-3xl p-8 sm:p-12">
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white mb-8 text-center">Mitglieder auf einen Blick</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
            <div><div class="text-4xl font-bold text-red-600 dark:text-red-500 mb-2">~100</div><div class="text-zinc-600 dark:text-zinc-400">Aktive Kameradinnen &amp; Kameraden</div></div>
            <div><div class="text-4xl font-bold text-amber-600 dark:text-amber-500 mb-2">~30</div><div class="text-zinc-600 dark:text-zinc-400">Jugendfeuerwehr-Mitglieder</div></div>
            <div><div class="text-4xl font-bold text-zinc-600 dark:text-zinc-400 mb-2">20</div><div class="text-zinc-600 dark:text-zinc-400">Kameraden in der Ehrenabteilung</div></div>
        </div>
    </section>

    {{-- Ausbildung --}}
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div>
                <span class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Qualifikation</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-4">Ausbildung</h2>
                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
                    Die Ausbildung in der Feuerwehr ist sehr vielfältig. Die Laufbahrlehrgänge sind maßgebend für den Dienstgrad.
                </p>
                <div class="space-y-3">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-white uppercase tracking-wider">Laufbahrlehrgänge</h4>
                    @foreach([
                        ['label' => 'Grundausbildung', 'sub' => 'Gemeindeebene'],
                        ['label' => 'Truppführerausbildung', 'sub' => 'Kreisebene'],
                        ['label' => 'Gruppenführerausbildung', 'sub' => 'Landesebene'],
                        ['label' => 'Zugführerlehrgang', 'sub' => 'Landesebene'],
                        ['label' => 'Ausbildung zum Verbandsführer', 'sub' => 'Landesebene'],
                    ] as $lehrgang)
                    <div class="flex items-center gap-3 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-3">
                        <div class="w-2 h-2 rounded-full bg-red-600 shrink-0"></div>
                        <span class="text-zinc-800 dark:text-zinc-200 text-sm font-medium">{{ $lehrgang['label'] }}</span>
                        <span class="ml-auto text-xs text-zinc-500">{{ $lehrgang['sub'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-zinc-900 dark:text-white uppercase tracking-wider mt-10 lg:mt-10 mb-3">Sonderlehrgänge</h4>
                <div class="space-y-3">
                    @foreach([
                        'Atemschutzgeräteträgerausbildung',
                        'Lehrgang zum Maschinisten für Pumpen',
                        'ABC-Ausbildung (Umgang mit Gefahrstoffen)',
                    ] as $slg)
                    <div class="flex items-center gap-3 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-3">
                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                        <span class="text-zinc-800 dark:text-zinc-200 text-sm">{{ $slg }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6">
                    <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Einsatzgeschehen &amp; Notruf</h4>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
                        Der Notruf 112 läuft bei der Leitstelle des Kreises Düren in Kreuzau-Stockheim auf.
                        In Abhängigkeit von Alarmstichwort, Ortsangabe und Tageszeit werden automatisch Einheiten alarmiert.
                    </p>
                    <a href="tel:112" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold px-5 py-2.5 rounded-lg text-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        Notruf 112
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
