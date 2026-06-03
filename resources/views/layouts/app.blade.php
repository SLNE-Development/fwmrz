<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title', 'Freiwillige Feuerwehr Merzenich')</title>
  <meta name="description"
        content="@yield('description', 'Offizielle Website der Freiwilligen Feuerwehr Merzenich – vier Löschgruppen, rund 100 ehrenamtliche Kameradinnen und Kameraden.')">
  <meta name="robots" content="@yield('robots', 'index, follow')">
  <link rel="canonical" href="@yield('canonical', url()->current())">
  <meta name="theme-color" content="#dc2626">

  <meta property="og:site_name" content="Freiwillige Feuerwehr Merzenich">
  <meta property="og:locale" content="de_DE">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:title" content="@yield('og_title', 'Freiwillige Feuerwehr Merzenich')">
  <meta property="og:description"
        content="@yield('og_description', 'Offizielle Website der Freiwilligen Feuerwehr Merzenich – vier Löschgruppen, rund 100 ehrenamtliche Kameradinnen und Kameraden.')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:image" content="@yield('og_image', asset('images/hero/hero.jpg'))">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="@yield('og_title', 'Freiwillige Feuerwehr Merzenich')">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('og_title', 'Freiwillige Feuerwehr Merzenich')">
  <meta name="twitter:description"
        content="@yield('og_description', 'Offizielle Website der Freiwilligen Feuerwehr Merzenich.')">
  <meta name="twitter:image" content="@yield('og_image', asset('images/hero/hero.jpg'))">

  <link rel="icon" href="/images/favicon/favicon.ico">
  <link rel="apple-touch-icon" href="/images/favicon/apple-touch-icon.png">

  @yield('structured_data')
  @include('layouts.ld')

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    #site-header {
      background: transparent;
      transition: background .4s ease, backdrop-filter .4s ease, box-shadow .4s ease, border-color .4s ease;
    }

    #site-header.scrolled {
      background: rgba(255, 255, 255, .65);
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      box-shadow: 0 1px 0 rgba(220, 38, 38, .15), 0 4px 24px rgba(0, 0, 0, .06);
      border-bottom-color: rgba(220, 38, 38, .12) !important;
    }

    html.dark #site-header.scrolled {
      background: rgba(9, 9, 11, .60);
      box-shadow: 0 1px 0 rgba(220, 38, 38, .25), 0 4px 24px rgba(0, 0, 0, .3);
    }

    [x-cloak] {
      display: none !important;
    }
  </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans antialiased">

<!--    {{-- Emergency banner --}}-->
<!--    <div class="bg-red-700 text-white text-center text-xs py-1.5 px-4 font-semibold tracking-widest uppercase">-->
<!--        <span class="inline-flex items-center gap-2">-->
<!--            <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>-->
<!--            Notruf: <strong class="text-lg leading-none">112</strong>-->
<!--            &ensp;·&ensp; Kein Notfall? Gemeinde Merzenich: +49 2421 399-0-->
<!--        </span>-->
<!--    </div>-->

<header id="site-header" class="sticky top-0 z-50 border-b border-transparent">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-18">
      <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0">
        <img src="https://feuerwehr-merzenich.de/images/logo/logo.png"
             alt="Feuerwehr Merzenich"
             class="h-10 w-auto drop-shadow-sm group-hover:scale-105 transition-transform duration-200"
             onerror="this.style.display='none'">
        <div class="hidden sm:block">
          <div class="text-zinc-900 dark:text-white font-bold text-sm leading-tight">Freiwillige
            Feuerwehr
          </div>
          <div class="text-red-600 dark:text-red-400 font-bold text-sm leading-tight tracking-wide">
            Merzenich
          </div>
        </div>
      </a>

      <nav class="hidden lg:flex items-center gap-1">
        @php $current = request()->route()->getName() ?? ''; @endphp
        @foreach([
        ['route' => 'einsaetze.index', 'label' => 'Einsätze'],
        ['route' => 'news.index', 'label' => 'Aktuelles'],
        ['route' => 'organisation', 'label' => 'Organisation'],
        ['route' => 'kontakt', 'label' => 'Kontakt'],
        ] as $item)
        <a href="{{ route($item['route']) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150
                              {{ str_starts_with($current, explode('.', $item['route'])[0])
                                  ? 'text-red-600 bg-red-50 dark:bg-red-950/50 dark:text-red-400'
                                  : 'text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">
          {{ $item['label'] }}
        </a>
        @endforeach
        <a href="{{ route('mitmachen') }}"
           class="ml-2 px-5 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition-colors duration-150 pulse-red">
          Mitmachen
        </a>
      </nav>

      <button id="menu-btn"
              class="lg:hidden flex flex-col gap-1.5 p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
              aria-label="Menü öffnen" aria-expanded="false">
        <span class="block w-6 h-0.5 bg-zinc-600 dark:bg-zinc-300"></span>
        <span class="block w-6 h-0.5 bg-zinc-600 dark:bg-zinc-300"></span>
        <span class="block w-4 h-0.5 bg-zinc-600 dark:bg-zinc-300"></span>
      </button>
    </div>
  </div>

  <div id="mobile-nav"
       class="hidden lg:hidden border-t border-zinc-200 dark:border-zinc-800 bg-white/98 dark:bg-zinc-950/98 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1">
      @foreach([
      ['route' => 'einsaetze.index', 'label' => 'Einsätze'],
      ['route' => 'news.index', 'label' => 'Aktuelles'],
      ['route' => 'organisation', 'label' => 'Organisation'],
      ['route' => 'kontakt', 'label' => 'Kontakt'],
      ] as $item)
      <a href="{{ route($item['route']) }}"
         class="px-4 py-3 rounded-lg text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
        {{ $item['label'] }}
      </a>
      @endforeach
      <a href="{{ route('mitmachen') }}"
         class="mt-2 px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg text-center transition-colors">
        Mitmachen
      </a>
    </div>
  </div>
</header>

<main>@yield('content')</main>

{{-- Footer --}}
<footer class="bg-zinc-100 dark:bg-zinc-900 border-t border-zinc-200 dark:border-zinc-800 mt-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
      <div class="lg:col-span-2">
        <div class="flex items-center gap-3 mb-4">
          <img src="https://feuerwehr-merzenich.de/images/logo/logo.png"
               alt="Feuerwehr Merzenich" class="h-10 w-auto" onerror="this.style.display='none'">
          <div>
            <div class="text-zinc-900 dark:text-white font-bold text-sm">Freiwillige Feuerwehr</div>
            <div class="text-red-600 dark:text-red-400 font-bold text-sm">Merzenich</div>
          </div>
        </div>
        <p class="text-zinc-500 dark:text-zinc-400 text-sm leading-relaxed mb-4">
          Valdersweg 1, 52399 Merzenich<br>
          Tel.: <a href="tel:+492421399100"
                   class="hover:text-red-600 dark:hover:text-red-400 transition-colors">+49 2421
            399-0</a><br>
          E-Mail: <a href="mailto:wehrleitung@gemeinde-merzenich.de"
                     class="hover:text-red-600 dark:hover:text-red-400 transition-colors">wehrleitung@gemeinde-merzenich.de</a>
        </p>
        <div class="flex flex-col gap-1 justify-center">
          <a href="https://www.facebook.com/Freiwillige-Feuerwehr-Merzenich-394835230701997/"
             target="_blank" rel="nofollow noreferrer"
             class="inline-flex items-center gap-2 text-zinc-500 dark:text-zinc-400 hover:text-blue-600 dark:hover:text-blue-400 text-sm transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
            Facebook
          </a>
          <a href="https://www.instagram.com/feuerwehr_merzenich/"
             target="_blank" rel="nofollow noreferrer"
             class="inline-flex items-center gap-2 text-zinc-500 dark:text-zinc-400 hover:text-pink-600 dark:hover:text-pink-400 text-sm transition-colors mt-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                  d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3h-8.5zm10.71-.21a1.21 1.21 0 11-2.42-.01c0 .67.54 1.21 1.21 1.21s1.21-.54 1.21-1.21zM12 7a5 5 0 110 10A5 5 0 0112 7zm0 1.5a3.5 3.5 0 100 7a3.5 3.5 0 000-7z"/>
            </svg>
            Instagram
          </a>
        </div>
      </div>

      <div>
        <h3 class="text-zinc-900 dark:text-white font-semibold text-sm uppercase tracking-wider mb-4">
          Navigation</h3>
        <ul class="space-y-2">
          @foreach([
          ['route' => 'einsaetze.index', 'label' => 'Einsätze'],
          ['route' => 'news.index', 'label' => 'Aktuelles'],
          ['route' => 'organisation', 'label' => 'Organisation'],
          ['route' => 'kontakt', 'label' => 'Kontakt'],
          ['route' => 'mitmachen', 'label' => 'Mitmachen'],
          ] as $item)
          <li><a href="{{ route($item['route']) }}"
                 class="text-zinc-500 dark:text-zinc-400 hover:text-red-600 dark:hover:text-red-400 text-sm transition-colors">{{
              $item['label'] }}</a></li>
          @endforeach
          <li><a href="{{ url('/admin') }}"
                 class="text-zinc-500 dark:text-zinc-400 hover:text-red-600 dark:hover:text-red-400 text-sm transition-colors">Anmelden</a>
          </li>
        </ul>
      </div>

      <div>
        <h3 class="text-zinc-900 dark:text-white font-semibold text-sm uppercase tracking-wider mb-4">
          Partner &amp; Links</h3>
        <ul class="space-y-2">
          @foreach([
          ['url' => 'https://gemeinde-merzenich.de', 'label' => 'Gemeinde Merzenich'],
          ['url' => 'https://www.kfv-dueren.de/', 'label' => 'Kreisfeuerwehrverband Düren'],
          ['url' => 'https://www.kfv-dueren.de/feuerwehr/feuerschutztechnischeszentrum', 'label' =>
          'Feuerschutztechn. Zentrum'],
          ['url' => 'https://nobiz-eifel-rur.de/', 'label' => 'Notfallbildungszentrum Eifel-Rur'],
          ] as $p)
          <li>
            <a href="{{ $p['url'] }}" target="_blank" rel="nofollow noreferrer"
               class="text-zinc-500 dark:text-zinc-400 hover:text-red-600 dark:hover:text-red-400 text-sm transition-colors inline-flex items-center gap-1">
              {{ $p['label'] }}
              <svg class="w-3 h-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                   stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div
        class="mt-10 pt-6 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-zinc-400 dark:text-zinc-500">
      <span>© {{ date('Y') }} Freiwillige Feuerwehr Merzenich. Alle Rechte vorbehalten.</span>
      <div class="flex items-center gap-5">
        <a href="{{ route('impressum') }}"
           class="hover:text-red-600 dark:hover:text-red-400 transition-colors">Impressum</a>
        <a href="{{ route('datenschutz') }}"
           class="hover:text-red-600 dark:hover:text-red-400 transition-colors">Datenschutzerklärung</a>

        {{-- Theme Toggle --}}
        <button data-theme-toggle
                class="flex items-center gap-2 bg-zinc-200 dark:bg-zinc-800 hover:bg-zinc-300 dark:hover:bg-zinc-700 text-zinc-600 dark:text-zinc-300 text-xs font-medium px-3 py-1.5 rounded-full transition-colors"
                aria-label="Farbschema wechseln">
          {{-- Sun icon (shown in dark mode) --}}
          <svg data-theme-icon-light class="w-3.5 h-3.5" style="display:none" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
          </svg>
          {{-- Moon icon (shown in light mode) --}}
          <svg data-theme-icon-dark class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
          </svg>
          <span data-theme-icon-dark>Dunkel</span>
          <span data-theme-icon-light style="display:none">Hell</span>
        </button>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
