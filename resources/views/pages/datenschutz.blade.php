@extends('layouts.app')
@section('title', 'Datenschutzerklärung | Freiwillige Feuerwehr Merzenich')

@section('content')
<div class="bg-zinc-900 border-b border-zinc-800 pt-12 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 mb-3 uppercase tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Startseite</a>
      <span>›</span><span class="text-zinc-300">Datenschutzerklärung</span>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold text-white">Datenschutzerklärung</h1>
  </div>
</div>
<div
    class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-10 text-zinc-700 dark:text-zinc-300 text-sm leading-relaxed">

  <section>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">1. Datenschutz auf einen
      Blick</h2>
    <h3 class="font-semibold text-zinc-800 dark:text-white mb-2">Allgemeine Hinweise</h3>
    <p>Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren
      personenbezogenen Daten passiert, wenn Sie diese Website besuchen. Personenbezogene Daten sind
      alle Daten, mit denen Sie persönlich identifiziert werden können.</p>
    <h3 class="font-semibold text-zinc-800 dark:text-white mt-4 mb-2">Datenerfassung auf dieser
      Website</h3>
    <p><strong class="text-zinc-900 dark:text-white">Wer ist verantwortlich für die Datenerfassung
        auf dieser Website?</strong><br>
      Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen
      Kontaktdaten können Sie dem Impressum dieser Website entnehmen.</p>
    <p class="mt-3"><strong class="text-zinc-900 dark:text-white">Wie erfassen wir Ihre
        Daten?</strong><br>
      Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen (z.&nbsp;B. Daten,
      die Sie in ein Kontaktformular eingeben). Andere Daten werden automatisch oder nach Ihrer
      Einwilligung beim Besuch der Website durch unsere IT-Systeme erfasst (z.&nbsp;B.
      Internetbrowser, Betriebssystem, Uhrzeit des Seitenaufrufs).</p>
    <p class="mt-3"><strong class="text-zinc-900 dark:text-white">Wofür nutzen wir Ihre
        Daten?</strong><br>
      Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu
      gewährleisten. Andere Daten können zur Analyse Ihres Nutzerverhaltens verwendet werden.</p>
    <p class="mt-3"><strong class="text-zinc-900 dark:text-white">Welche Rechte haben Sie bezüglich
        Ihrer Daten?</strong><br>
      Sie haben jederzeit das Recht, unentgeltlich Auskunft über Herkunft, Empfänger und Zweck Ihrer
      gespeicherten personenbezogenen Daten zu erhalten. Sie haben außerdem ein Recht, die
      Berichtigung oder Löschung dieser Daten zu verlangen. Wenn Sie eine Einwilligung zur
      Datenverarbeitung erteilt haben, können Sie diese Einwilligung jederzeit für die Zukunft
      widerrufen. Außerdem haben Sie das Recht, unter bestimmten Umständen die Einschränkung der
      Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Des Weiteren steht Ihnen ein
      Beschwerderecht bei der zuständigen Aufsichtsbehörde zu.</p>
  </section>

  <section>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">2. Hosting</h2>
    <p>Diese Website wird bei einem externen Dienstleister gehostet. Die personenbezogenen Daten,
      die auf dieser Website erfasst werden, werden auf den Servern des Hosters gespeichert.</p>
  </section>

  <section>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">3. Allgemeine Hinweise und
      Pflichtinformationen</h2>
    <h3 class="font-semibold text-zinc-800 dark:text-white mb-2">Datenschutz</h3>
    <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Wir
      behandeln Ihre personenbezogenen Daten vertraulich und entsprechend den gesetzlichen
      Datenschutzvorschriften sowie dieser Datenschutzerklärung.</p>
    <h3 class="font-semibold text-zinc-800 dark:text-white mt-4 mb-2">Verantwortliche Stelle</h3>
    <p>Freiwillige Feuerwehr Merzenich<br>Valdersweg 1<br>52399 Merzenich<br>E-Mail: <a
          href="mailto:wehrleitung@gemeinde-merzenich.de"
          class="text-red-600 dark:text-red-400 hover:underline">wehrleitung@gemeinde-merzenich.de</a>
    </p>
  </section>

  <section>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">4. Datenerfassung auf dieser
      Website</h2>
    <h3 class="font-semibold text-zinc-800 dark:text-white mb-2">Kontaktformular</h3>
    <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem
      Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der
      Anfrage und für den Fall von Anschlussfragen bei uns gespeichert. Diese Daten geben wir nicht
      ohne Ihre Einwilligung weiter.</p>
    <p class="mt-3">Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b
      DSGVO, sofern Ihre Anfrage mit der Erfüllung eines Vertrags zusammenhängt oder zur
      Durchführung vorvertraglicher Maßnahmen erforderlich ist. In allen übrigen Fällen beruht die
      Verarbeitung auf unserem berechtigten Interesse an der effektiven Bearbeitung der an uns
      gerichteten Anfragen (Art. 6 Abs. 1 lit. f DSGVO).</p>
    <h3 class="font-semibold text-zinc-800 dark:text-white mt-4 mb-2">Server-Log-Dateien</h3>
    <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten
      Server-Log-Dateien, die Ihr Browser automatisch an uns übermittelt. Dies sind: Browsertyp und
      Browserversion, verwendetes Betriebssystem, Referrer URL, Hostname des zugreifenden Rechners,
      Uhrzeit der Serveranfrage, IP-Adresse.</p>
  </section>

  <section>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">5. Ihre Rechte</h2>
    <p>Sie haben gegenüber uns folgende Rechte hinsichtlich der Sie betreffenden personenbezogenen
      Daten: Recht auf Auskunft, Recht auf Berichtigung oder Löschung, Recht auf Einschränkung der
      Verarbeitung, Recht auf Widerspruch gegen die Verarbeitung, Recht auf
      Datenübertragbarkeit.</p>
    <p class="mt-3">Sie haben zudem das Recht, sich bei einer Datenschutz-Aufsichtsbehörde über die
      Verarbeitung Ihrer personenbezogenen Daten durch uns zu beschweren. Für Nordrhein-Westfalen
      ist dies der Landesbeauftragte für Datenschutz und Informationsfreiheit NRW.</p>
  </section>
</div>
@endsection

