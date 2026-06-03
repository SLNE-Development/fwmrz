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
    <p class="text-zinc-400 max-w-2xl">Die Feuerwehr Merzenich ist eine freiwillige Feuerwehr, die
      ausschließlich aus ehrenamtlichen Kräften besteht.</p>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-24">

  {{-- Wehrleitung --}}
  <section>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <span
            class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Führung</span>
        <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-4">
          Wehrleitung</h2>
        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
          Geleitet wird die Wehr durch die Wehrleitung. Diese ist unter anderem zuständig für:
        </p>
        <ul class="space-y-3 mb-8">
          @foreach(['Organisation & Planung', 'Personal & Personalentwicklung', 'Fahrzeug- und
          Gerätetechnik', 'Ausbildungskoordination'] as $task)
          <li class="flex items-center gap-3 text-zinc-700 dark:text-zinc-300 text-sm">
                        <span
                            class="w-5 h-5 rounded-full bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-800/40 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3 text-red-600 dark:text-red-400" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path
                                  stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </span>
            {{ $task }}
          </li>
          @endforeach
        </ul>

        {{-- Kontaktkarte ohne generisches Icon --}}
        <div
            class="bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-5 flex items-center gap-5">
          {{-- Foto-Placeholder Wehrleiter --}}
          <div
              class="relative w-16 h-16 rounded-full overflow-hidden bg-zinc-200 dark:bg-zinc-700 shrink-0">
            <img src="/images/organisation/wehrleiter.jpg"
                 alt="Patrick Harzheim"
                 class="w-full h-full object-cover"
                 onerror="this.style.display='none'">
            <div
                class="absolute inset-0 flex items-center justify-center bg-red-100 dark:bg-red-900/40">
              <span class="text-xl font-bold text-red-600 dark:text-red-400">PH</span>
            </div>
          </div>
          <div class="flex-1 min-w-0">
            <div class="font-bold text-zinc-900 dark:text-white">Patrick Harzheim</div>
            <div class="text-sm text-red-600 dark:text-red-400 mb-2">Wehrleiter</div>
            <div class="space-y-1 text-xs text-zinc-500 dark:text-zinc-400">
              <div><a href="mailto:wehrleitung@gemeinde-merzenich.de"
                      class="hover:text-red-600 dark:hover:text-red-400 transition-colors break-all">wehrleitung@gemeinde-merzenich.de</a>
              </div>
              <div><a href="tel:+4924213990"
                      class="hover:text-red-600 dark:hover:text-red-400 transition-colors">+49 2421
                  399-0</a></div>
            </div>
          </div>
        </div>
      </div>

      {{-- Foto Gerätehaus / Wache --}}
      <div
          class="relative rounded-2xl overflow-hidden aspect-[4/3] bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center">
        <img src="/images/organisation/geratehaus.jpg"
             alt="Gerätehaus Merzenich"
             class="absolute inset-0 w-full h-full object-cover"
             onerror="this.style.display='none'">
        <div class="flex flex-col items-center gap-3 text-zinc-300 dark:text-zinc-600">
          <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/>
          </svg>
          <span class="text-sm font-medium">Gerätehaus · Foto folgt</span>
        </div>
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 hidden">
          <p class="text-white text-sm font-medium">Gerätehaus Merzenich</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Löschgruppen --}}
  <section>
    <div class="mb-8">
      <span
          class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Einheiten</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-3">Unsere
        Löschgruppen</h2>
      <p class="text-zinc-600 dark:text-zinc-400 max-w-2xl">Innerhalb unserer Gemeinde gibt es 4
        Löschgruppen in Merzenich, Golzheim, Morschenich und Girbelsrath.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach([
      ['name' => 'Merzenich', 'founded' => '1923', 'img' => 'merzenich.jpg'],
      ['name' => 'Golzheim', 'founded' => '1934', 'img' => 'golzheim.jpg'],
      ['name' => 'Morschenich', 'founded' => '1928', 'img' => 'morschenich.jpg'],
      ['name' => 'Girbelsrath', 'founded' => '1953', 'img' => 'girbelsrath.jpg'],
      ] as $lg)
      <div
          class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-red-300 dark:hover:border-red-700/50 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 group">
        {{-- Stationsfoto --}}
        <div
            class="relative aspect-[4/3] bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center overflow-hidden">
          <img src="/images/loeschgruppen/{{ $lg['img'] }}"
               alt="LG {{ $lg['name'] }}"
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
               onerror="this.style.display='none'">
          <div class="flex flex-col items-center gap-2 text-zinc-300 dark:text-zinc-600">
            {{-- Feuerwehrhelm statt Flamme --}}
            <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.25">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3C8 3 4.5 6 4 10H3a1 1 0 00-1 1v1a1 1 0 001 1h18a1 1 0 001-1v-1a1 1 0 00-1-1h-1C19.5 6 16 3 12 3z"/>
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13v1a2 2 0 002 2h10a2 2 0 002-2v-1"/>
            </svg>
            <span class="text-xs">Foto folgt</span>
          </div>
        </div>
        <div class="p-5">
          <h3 class="font-bold text-zinc-900 dark:text-white mb-0.5">LG {{ $lg['name'] }}</h3>
          <p class="text-xs text-zinc-400 dark:text-zinc-500 mb-3">Gegründet {{ $lg['founded']
            }}</p>
          <ul class="space-y-1 text-xs text-zinc-600 dark:text-zinc-400">
            <li class="flex items-center gap-2"><span
                  class="w-1.5 h-1.5 rounded-full bg-red-500 shrink-0"></span>Aktive Abteilung
            </li>
            <li class="flex items-center gap-2"><span
                  class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0"></span>Jugendfeuerwehr
            </li>
            <li class="flex items-center gap-2"><span
                  class="w-1.5 h-1.5 rounded-full bg-zinc-400 shrink-0"></span>Ehrenabteilung
            </li>
          </ul>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  {{-- Mitglieder Zahlen --}}
  <section
      class="bg-zinc-50 dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 rounded-3xl p-8 sm:p-12">
    <h2 class="text-2xl font-bold text-zinc-900 dark:text-white mb-8 text-center">Mitglieder auf
      einen Blick</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
      <div>
        <div class="text-4xl font-bold text-red-600 dark:text-red-500 mb-2">~100</div>
        <div class="text-zinc-600 dark:text-zinc-400">Aktive Kameradinnen &amp; Kameraden</div>
      </div>
      <div>
        <div class="text-4xl font-bold text-amber-600 dark:text-amber-500 mb-2">~30</div>
        <div class="text-zinc-600 dark:text-zinc-400">Jugendfeuerwehr-Mitglieder</div>
      </div>
      <div>
        <div class="text-4xl font-bold text-zinc-600 dark:text-zinc-400 mb-2">20</div>
        <div class="text-zinc-600 dark:text-zinc-400">Kameraden in der Ehrenabteilung</div>
      </div>
    </div>
  </section>

  {{-- Ausbildung --}}
  <section>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
      <div>
        <span
            class="inline-block text-xs text-red-600 dark:text-red-400 font-semibold uppercase tracking-widest mb-3">Qualifikation</span>
        <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-white mb-4">
          Ausbildung</h2>
        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
          Die Ausbildung in der Feuerwehr ist sehr vielfältig. Die Laufbahnlehrgänge sind maßgebend
          für den Dienstgrad.
        </p>
        <div class="space-y-2 mb-8">
          <h4 class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-3">
            Laufbahrlehrgänge</h4>
          @foreach([
          ['label' => 'Grundausbildung', 'sub' => 'Gemeindeebene'],
          ['label' => 'Truppführerausbildung', 'sub' => 'Kreisebene'],
          ['label' => 'Gruppenführerausbildung', 'sub' => 'Landesebene'],
          ['label' => 'Zugführerlehrgang', 'sub' => 'Landesebene'],
          ['label' => 'Ausbildung zum Verbandsführer', 'sub' => 'Landesebene'],
          ] as $i => $lehrgang)
          <div
              class="flex items-center gap-3 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-3">
            <span
                class="w-6 h-6 rounded-full bg-red-600 text-white text-xs font-bold flex items-center justify-center shrink-0">{{ $i + 1 }}</span>
            <span class="text-zinc-800 dark:text-zinc-200 text-sm font-medium flex-1">{{ $lehrgang['label'] }}</span>
            <span class="text-xs text-zinc-400 shrink-0">{{ $lehrgang['sub'] }}</span>
          </div>
          @endforeach
        </div>
        <h4 class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-3">
          Sonderlehrgänge</h4>
        <div class="space-y-2">
          @foreach([
          'Atemschutzgeräteträger',
          'Maschinist für Pumpen',
          'ABC-Gefahrstoffe',
          ] as $slg)
          <div
              class="flex items-center gap-3 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-3">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0"></span>
            <span class="text-zinc-800 dark:text-zinc-200 text-sm">{{ $slg }}</span>
          </div>
          @endforeach
        </div>
      </div>

      <div class="space-y-6">
        {{-- Ausbildungsfoto --}}
        <div
            class="relative rounded-2xl overflow-hidden aspect-[4/3] bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center">
          <img src="/images/organisation/ausbildung.jpg"
               alt="Ausbildung bei der Feuerwehr Merzenich"
               class="absolute inset-0 w-full h-full object-cover"
               onerror="this.style.display='none'">
          <div class="flex flex-col items-center gap-3 text-zinc-300 dark:text-zinc-600">
            <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
            <span class="text-sm font-medium">Ausbildung · Foto folgt</span>
          </div>
        </div>

        <div
            class="bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6">
          <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Einsatzgeschehen &amp;
            Notruf</h4>
          <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
            Der Notruf 112 läuft bei der Leitstelle des Kreises Düren in Kreuzau-Stockheim auf.
            In Abhängigkeit von Alarmstichwort, Ortsangabe und Tageszeit werden automatisch
            Einheiten alarmiert.
          </p>
          <a href="tel:112"
             class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold px-5 py-2.5 rounded-lg text-sm transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
            </svg>
            Notruf 112
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
