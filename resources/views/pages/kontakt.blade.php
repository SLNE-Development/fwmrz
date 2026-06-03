@extends('layouts.app')
@section('title', 'Kontakt | Freiwillige Feuerwehr Merzenich')
@section('description', 'Kontaktieren Sie die Freiwillige Feuerwehr Merzenich.')

@section('content')

<div class="relative bg-zinc-900 border-b border-zinc-800 pt-12 pb-10 overflow-hidden">
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span><span class="text-zinc-300">Kontakt</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Kontakt</h1>
    <p class="text-zinc-400">Bei Fragen, Anregungen oder Interesse an einer Mitgliedschaft stehen
      wir Ihnen gerne zur Verfügung.</p>
  </div>
</div>
{{-- rathaus Foto Platzhalter --}}
<div
    class="relative h-56 bg-zinc-100 dark:bg-zinc-800/60 border-b border-zinc-200 dark:border-zinc-800 overflow-hidden">
  <img src="/images/kontakt/rathaus.jpg" alt="rathaus Merzenich"
       onerror="this.style.display='none'"
       class="w-full h-full object-cover object-center">
  <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/30 to-transparent"></div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

    {{-- Contact Info --}}
    <div class="lg:col-span-2 space-y-6">
      <div
          class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl p-6">
        <h3 class="font-semibold text-zinc-900 dark:text-white mb-4">Wehrleitung</h3>
        <div class="space-y-3 text-sm text-zinc-600 dark:text-zinc-400">
          <div class="flex items-start gap-3">
            <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
            </svg>
            <span>Valdersweg 1<br>52399 Merzenich</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
            </svg>
            <a href="tel:+4924213990"
               class="hover:text-red-500 dark:hover:text-red-400 transition-colors">+49 2421
              399-0</a>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
            </svg>
            <a href="mailto:wehrleitung@gemeinde-merzenich.de"
               class="hover:text-red-500 dark:hover:text-red-400 transition-colors break-all">wehrleitung@gemeinde-merzenich.de</a>
          </div>
        </div>
      </div>
      <div
          class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/40 rounded-2xl p-6 text-center">
        <p class="text-sm text-zinc-700 dark:text-zinc-300 mb-2 font-medium">Im Notfall bitte
          immer:</p>
        <a href="tel:112"
           class="text-5xl font-bold text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400 transition-colors">112</a>
        <p class="text-xs text-zinc-500 mt-2">Notruf – kostenlos, 24/7</p>
      </div>
    </div>

    {{-- Contact Form --}}
    <div class="lg:col-span-3">
      @if(session('success'))
      <div
          class="bg-green-50 dark:bg-green-900/30 border border-green-300 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl px-5 py-4 mb-6 text-sm">
        ✓ Ihre Nachricht wurde erfolgreich übermittelt. Wir melden uns so schnell wie möglich.
      </div>
      @endif

      <form action="{{ route('kontakt.send') }}" method="POST" class="space-y-5">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Name
              <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 focus:border-red-500 dark:focus:border-red-600 focus:ring-1 focus:ring-red-500 dark:focus:ring-red-600 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 rounded-xl px-4 py-3 text-sm outline-none transition-colors">
            @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label
                class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Telefon</label>
            <input type="tel" name="phone" value="{{ old('phone') }}"
                   class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 focus:border-red-500 dark:focus:border-red-600 focus:ring-1 focus:ring-red-500 dark:focus:ring-red-600 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 rounded-xl px-4 py-3 text-sm outline-none transition-colors">
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">E-Mail-Adresse
            <span class="text-red-500">*</span></label>
          <input type="email" name="email" value="{{ old('email') }}" required
                 class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 focus:border-red-500 dark:focus:border-red-600 focus:ring-1 focus:ring-red-500 dark:focus:ring-red-600 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 rounded-xl px-4 py-3 text-sm outline-none transition-colors">
          @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Betreff
            <span class="text-red-500">*</span></label>
          <select name="subject" required
                  class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 focus:border-red-500 dark:focus:border-red-600 focus:ring-1 focus:ring-red-500 dark:focus:ring-red-600 text-zinc-900 dark:text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
            <option value="">Bitte wählen …</option>
            <option value="Presse / Webmaster" {{ old(
            'subject') === 'Presse / Webmaster' ? 'selected' : '' }}>Presse / Webmaster</option>
            <option value="Wehrleitung" {{ old(
            'subject') === 'Wehrleitung' ? 'selected' : '' }}>Wehrleitung</option>
            <option value="Mitmachen" {{ old(
            'subject') === 'Mitmachen' ? 'selected' : '' }}>Mitmachen / Mitgliedschaft</option>
            <option value="Sonstiges" {{ old(
            'subject') === 'Sonstiges' ? 'selected' : '' }}>Sonstiges</option>
          </select>
          @error('subject')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Nachricht
            <span class="text-red-500">*</span></label>
          <textarea name="message" rows="5" required
                    class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 focus:border-red-500 dark:focus:border-red-600 focus:ring-1 focus:ring-red-500 dark:focus:ring-red-600 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 rounded-xl px-4 py-3 text-sm outline-none transition-colors resize-none">{{ old('message') }}</textarea>
          @error('message')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-start gap-3">
          <input type="checkbox" name="privacy" id="privacy" required
                 class="mt-0.5 w-4 h-4 rounded border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 accent-red-600">
          <label for="privacy" class="text-sm text-zinc-600 dark:text-zinc-400">
            Ich habe die <a href="{{ route('datenschutz') }}"
                            class="text-red-600 dark:text-red-400 hover:underline" target="_blank">Datenschutzerklärung</a>
            gelesen und akzeptiere diese. <span class="text-red-500">*</span>
          </label>
        </div>
        <button type="submit"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3.5 rounded-xl transition-colors">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
          </svg>
          Nachricht senden
        </button>
      </form>
    </div>
  </div>
</div>

@endsection
