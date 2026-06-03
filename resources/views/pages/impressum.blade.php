@extends('layouts.app')
@section('title', 'Impressum | Freiwillige Feuerwehr Merzenich')
@section('description', 'Impressum der Freiwilligen Feuerwehr Merzenich gemäß § 5 TMG.')
@section('canonical', route('impressum'))
@section('robots', 'noindex, follow')

@section('content')
<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span><span class="text-zinc-300">Impressum</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white">Impressum</h1>
  </div>
</div>
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
  <div
      class="prose prose-zinc dark:prose-invert prose-p:text-zinc-600 dark:prose-p:text-zinc-300 prose-headings:text-zinc-900 dark:prose-headings:text-white prose-a:text-red-600 dark:prose-a:text-red-400 max-w-none space-y-8">

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Angaben gemäß § 5 TMG</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Freiwillige Feuerwehr Merzenich<br>
        Valdersweg 1<br>
        52399 Merzenich
      </p>
      <p class="text-zinc-500 dark:text-zinc-400 text-sm mt-2">Vertreten durch: Patrick Harzheim</p>
    </section>

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Kontakt</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Telefon: <a href="tel:+4924213990" class="text-red-600 dark:text-red-400 hover:underline">+49
          2421 399-0</a><br>
        Telefax: +49 2421 399-299<br>
        E-Mail: <a href="mailto:wehrleitung@gemeinde-merzenich.de"
                   class="text-red-600 dark:text-red-400 hover:underline">wehrleitung@gemeinde-merzenich.de</a>
      </p>
    </section>

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">EU-Streitschlichtung</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:
        <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="nofollow noreferrer"
           class="text-red-600 dark:text-red-400 hover:underline">https://ec.europa.eu/consumers/odr</a>.
        Unsere E-Mail-Adresse finden Sie oben im Impressum.
      </p>
    </section>

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Haftung für Inhalte</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Als Diensteanbieter sind wir gemäß § 7 Abs. 1 TMG für eigene Inhalte auf diesen Seiten nach
        den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter
        jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen
        oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.
      </p>
      <p class="text-zinc-700 dark:text-zinc-300 mt-3">
        Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den
        allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst
        ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden
        von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
      </p>
    </section>

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Haftung für Links</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen
        Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen.
        Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der
        Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf
        mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung
        nicht erkennbar.
      </p>
      <p class="text-zinc-700 dark:text-zinc-300 mt-3">
        Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete
        Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
        Rechtsverletzungen werden wir derartige Links umgehend entfernen.
      </p>
    </section>

    <section>
      <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Urheberrecht</h2>
      <p class="text-zinc-700 dark:text-zinc-300">
        Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem
        deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der
        Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung
        des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den
        privaten, nicht kommerziellen Gebrauch gestattet.
      </p>
      <p class="text-zinc-700 dark:text-zinc-300 mt-3">
        Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die
        Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche
        gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
        bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden
        wir derartige Inhalte umgehend entfernen.
      </p>
    </section>
  </div>
</div>
@endsection

