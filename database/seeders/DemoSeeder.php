<?php

namespace Database\Seeders;

use App\Models\Commitment;
use App\Models\CommitmentType;
use App\Models\News;
use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing
        Commitment::all()->each(function ($c) {
            $c->stations()->detach();
            $c->clearMediaCollection();
            $c->delete();
        });
        News::all()->each(function ($n) {
            $n->clearMediaCollection();
            $n->delete();
        });

        $user = User::first();
        $stationMerzenich = Station::firstOrCreate(['name' => 'Merzenich'], ['slug' => 'merzenich']);
        $stationGolzheim  = Station::firstOrCreate(['name' => 'Golzheim'],  ['slug' => 'golzheim']);
        $stationMorschenich = Station::firstOrCreate(['name' => 'Morschenich'], ['slug' => 'morschenich']);

        $typeBrand    = CommitmentType::firstOrCreate(['name' => 'Brand'],            ['slug' => 'brand',            'short' => 'B',  'aaoName' => 'Brand']);
        $typeTHW      = CommitmentType::firstOrCreate(['name' => 'Technische Hilfe'], ['slug' => 'technische-hilfe', 'short' => 'TH', 'aaoName' => 'Technische Hilfe']);
        $typeFehlalarm = CommitmentType::firstOrCreate(['name' => 'Fehlalarm'],       ['slug' => 'fehlalarm',        'short' => 'FA', 'aaoName' => 'Fehlalarm']);
        $typeUmwelt   = CommitmentType::firstOrCreate(['name' => 'Umwelt'],           ['slug' => 'umwelt',           'short' => 'U',  'aaoName' => 'Umwelt']);

        // ── EINSÄTZE ─────────────────────────────────────────────────────────────

        $commitments = [
            [
                'title' => 'Wohnungsbrand in der Dürener Straße',
                'slug'  => 'wohnungsbrand-duerener-strasse',
                'start' => now()->subDays(3)->setTime(14, 27),
                'type'  => $typeBrand,
                'stations' => [$stationMerzenich],
                'publicity' => 1,
                'body' => '<h2>Alarmierung</h2>
<p>Am Nachmittag des ' . now()->subDays(3)->format('d.m.Y') . ' wurde die Löschgruppe Merzenich um 14:27 Uhr zu einem gemeldeten Wohnungsbrand in die Dürener Straße alarmiert. Bereits auf der Anfahrt war eine deutliche Rauchentwicklung aus dem Obergeschoss eines zweigeschossigen Einfamilienhauses zu erkennen.</p>
<h2>Lage bei Eintreffen</h2>
<p>Bei Eintreffen der ersten Kräfte stand das Obergeschoss in Vollbrand. Eine Person konnte sich selbst ins Freie retten und wurde leicht verletzt dem Rettungsdienst übergeben. Der Angriffstrupp unter Atemschutz ging sofort mit einem C-Rohr zur Brandbekämpfung vor, während ein zweiter Trupp die betroffene Person suchte und das Gebäude auf weitere Personen kontrollierte.</p>
<h2>Maßnahmen</h2>
<ul>
<li>Zwei Atemschutztrupps zur Brandbekämpfung eingesetzt</li>
<li>Lüfter zur Entrauchung des Treppenhauses</li>
<li>Wasserversorgung über Hydrant an der Kreuzung sichergestellt</li>
<li>Drehleiter zur Kontrolle des Dachstuhls eingesetzt</li>
</ul>
<h2>Einsatzende</h2>
<p>Nach rund 2,5 Stunden konnte „Feuer aus" gemeldet werden. Das Gebäude ist vorerst nicht bewohnbar. Im Einsatz waren 24 Einsatzkräfte mit 5 Fahrzeugen.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?w=800&q=80',
                    'https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?w=800&q=80',
                ],
            ],
            [
                'title' => 'Verkehrsunfall B56 – eingeklemmte Person',
                'slug'  => 'verkehrsunfall-b56-eingeklemmte-person',
                'start' => now()->subDays(10)->setTime(7, 12),
                'type'  => $typeTHW,
                'stations' => [$stationMerzenich, $stationGolzheim],
                'publicity' => 1,
                'body' => '<h2>Einsatzstichwort: VU – Person eingeklemmt</h2>
<p>Auf der Bundesstraße 56 kam es in den frühen Morgenstunden zu einem schweren Verkehrsunfall zwischen zwei PKW. Eine Person war im Fahrzeug eingeklemmt und musste durch die Feuerwehr befreit werden.</p>
<h2>Technische Rettung</h2>
<p>Die Löschgruppen Merzenich und Golzheim wurden zeitgleich alarmiert. Der Spreizer und die Schneidemaschine kamen zum Einsatz, um die Fahrertür sowie die B-Säule des Fahrzeugs zu entfernen und der verletzten Person einen schonenden Zugang für den Rettungsdienst zu ermöglichen.</p>
<blockquote>Die Rettungszeit betrug insgesamt 18 Minuten ab Eintreffen des ersten Fahrzeugs.</blockquote>
<h2>Kräfte im Einsatz</h2>
<ul>
<li>LG Merzenich: HLF 20, MTF</li>
<li>LG Golzheim: LF 10</li>
<li>Rettungsdienst: RTW + NEF</li>
<li>Polizei: 2 Streifenfahrzeuge</li>
</ul>
<p>Die B56 war für die Dauer des Einsatzes in beiden Richtungen voll gesperrt. Der Einsatz endete nach 1 Stunde 45 Minuten.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1603198741940-ffe5e5df8c04?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1600096194534-95cf5ece04cf?w=800&q=80',
                ],
            ],
            [
                'title' => 'Ölspur auf der L33 zwischen Merzenich und Golzheim',
                'slug'  => 'oelspur-l33-merzenich-golzheim',
                'start' => now()->subDays(18)->setTime(11, 45),
                'type'  => $typeUmwelt,
                'stations' => [$stationMerzenich],
                'publicity' => 1,
                'body' => '<h2>Meldung</h2>
<p>Über die Leitstelle Düren wurde eine Ölspur auf der L33 zwischen Merzenich und Golzheim gemeldet. Die Ölspur erstreckte sich über ca. 1,2 Kilometer und stellte eine erhebliche Rutschgefahr für den Straßenverkehr dar.</p>
<h2>Maßnahmen</h2>
<p>Vier Kräfte der Löschgruppe Merzenich banden das ausgelaufene Öl mit Ölbindemittel ab. Insgesamt wurden rund 40 kg Bindemittel eingesetzt. Die Polizei sperrte die betroffene Strecke während der Arbeiten halbseitig.</p>
<p>Der Verursacher konnte durch die Polizei im weiteren Verlauf ermittelt werden.</p>
<h2>Fazit</h2>
<p>Einsatzdauer: ca. 55 Minuten. Eingesetzte Kräfte: 6 Kameradinnen und Kameraden mit 1 Fahrzeug (HLF 20).</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1545158535-c3f7168c28b6?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Fehlalarm – Rauchmelder Schule Merzenich',
                'slug'  => 'fehlalarm-rauchmelder-schule',
                'start' => now()->subDays(25)->setTime(9, 3),
                'type'  => $typeFehlalarm,
                'stations' => [$stationMerzenich],
                'publicity' => 1,
                'body' => '<p>Um 09:03 Uhr wurde die Löschgruppe Merzenich durch ausgelöste Brandmeldeanlage zur Grundschule Merzenich alarmiert. Nach Überprüfung des Gebäudes konnte kein Feuer oder Rauch festgestellt werden. Der Rauchmelder hatte vermutlich aufgrund von Kochgerüchen aus der schuleigenen Küche ausgelöst. Die Schule wurde nicht evakuiert.</p>
<p>Einsatzdauer: 22 Minuten.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Waldbrand – Grünfläche am Braunkohlerandgebiet',
                'slug'  => 'waldbrand-braunkohlerandgebiet',
                'start' => now()->subDays(45)->setTime(16, 30),
                'type'  => $typeBrand,
                'stations' => [$stationMerzenich, $stationMorschenich],
                'publicity' => 1,
                'body' => '<h2>Großeinsatz im Sommer</h2>
<p>Aufgrund der anhaltenden Trockenheit kam es zu einem Flächenbrand im Bereich der Rekultivierungsflächen am Rande des Braunkohlegebiets. Ein Funkenflug von einer landwirtschaftlichen Maschine hatte vermutlich die Vegetation entzündet.</p>
<h2>Ausmaß</h2>
<p>Betroffen war eine Fläche von schätzungsweise 2,5 Hektar trockener Vegetation. Die Gefahr einer Ausbreitung in angrenzende Waldgebiete erforderte den Einsatz beider Löschgruppen sowie Unterstützungskräfte der Nachbarfeuerwehren.</p>
<h2>Eingesetzte Kräfte</h2>
<ul>
<li>LG Merzenich: HLF 20, TLF 3000, MTF</li>
<li>LG Morschenich: LF 10</li>
<li>LG Düren-Rölsdorf (Nachbarfeuerwehr): TLF 4000</li>
<li>Gesamtstärke: 38 Einsatzkräfte</li>
</ul>
<h2>Wasserversorgung</h2>
<p>Da im betroffenen Bereich keine Hydranten vorhanden waren, wurde eine Pendelversorgung mit dem TLF 3000 und einem Tanklöschfahrzeug der Nachbarwehr eingerichtet. Zusätzlich wurde ein Wasserentnahmefahrzeug am nahegelegenen Kanal eingesetzt.</p>
<p>Nach knapp 4 Stunden Einsatz konnte „Feuer aus" gegeben werden. Die Nachlöscharbeiten dauerten weitere 90 Minuten.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1602615576820-ea14c4d4c6c8?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1542044896530-4ea88b13c1be?w=800&q=80',
                    'https://images.unsplash.com/photo-1601597111158-2fceff292cdc?w=800&q=80',
                ],
            ],
        ];

        foreach ($commitments as $data) {
            $commitment = Commitment::create([
                'title'              => $data['title'],
                'slug'               => $data['slug'],
                'body'               => $data['body'],
                'start'              => $data['start'],
                'user_id'            => $user->id,
                'commitment_type_id' => $data['type']->id,
                'publicity'          => $data['publicity'],
            ]);

            $commitment->stations()->sync(collect($data['stations'])->pluck('id'));

            if ($data['thumb_url']) {
                try {
                    $commitment->addMediaFromUrl($data['thumb_url'])
                        ->toMediaCollection('thumbnail');
                } catch (\Exception $e) {
                    // skip if URL not reachable
                }
            }

            foreach ($data['gallery_urls'] as $url) {
                try {
                    $commitment->addMediaFromUrl($url)
                        ->toMediaCollection('gallery');
                } catch (\Exception $e) {
                    // skip
                }
            }
        }

        // ── NEWS ─────────────────────────────────────────────────────────────────

        $newsItems = [
            [
                'title' => 'Jahreshauptversammlung 2025 – Rückblick und Ausblick',
                'slug'  => 'jahreshauptversammlung-2025',
                'publicity' => 1,
                'static' => false,
                'body' => '<h2>Rückblick auf ein ereignisreiches Jahr</h2>
<p>Die Jahreshauptversammlung der Freiwilligen Feuerwehr Merzenich fand im großen Saal des Bürgerhauses statt. Wehrleiter <strong>Hauptbrandmeister Thomas Kremer</strong> blickte auf ein ereignisreiches Jahr mit insgesamt <strong>87 Einsätzen</strong> zurück – darunter 34 Brandeinsätze, 28 technische Hilfeleistungen und 25 Fehleinsätze.</p>
<h2>Beförderungen und Ehrungen</h2>
<p>Im Rahmen der Versammlung wurden folgende Kameradinnen und Kameraden befördert:</p>
<ul>
<li><strong>Zum Oberfeuerwehrmann:</strong> Lena Becker, Markus Hoffmann</li>
<li><strong>Zum Hauptfeuerwehrmann:</strong> Jonas Schreiber</li>
<li><strong>Zum Unterbrandmeister:</strong> Sarah Vogt</li>
</ul>
<p>Zudem wurden drei Kameraden für 10-jährige und zwei für 25-jährige aktive Mitgliedschaft mit der Verdienstmedaille des Landes NRW ausgezeichnet.</p>
<h2>Ausblick 2026</h2>
<p>Für das laufende Jahr sind die Beschaffung eines neuen HLF 20 sowie eine umfangreiche Renovierung des Gerätehauses Golzheim geplant. Die Bürgermeisterin der Gemeinde Merzenich sicherte die Unterstützung der Gemeinde zu.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1560523159-4a9692d222ef?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Neues HLF 20 für die Löschgruppe Merzenich',
                'slug'  => 'neues-hlf-20-loeschgruppe-merzenich',
                'publicity' => 1,
                'static' => false,
                'body' => '<p>Die Löschgruppe Merzenich hat ein neues Hilfeleistungslöschgruppenfahrzeug <strong>HLF 20</strong> erhalten. Das moderne Fahrzeug auf Mercedes-Benz Atego-Fahrgestell ersetzt das bisherige, über 22 Jahre alte HLF 10/6 und stellt einen erheblichen Zuwachs an Einsatzkapazität dar.</p>
<h2>Technische Highlights</h2>
<ul>
<li>Löschwassertank: 2.000 Liter</li>
<li>Eingebaute Druckluftschaumanlage (CAFS)</li>
<li>Hydraulischer Rettungssatz (Spreizer, Schere, Zylinder)</li>
<li>Stromerzeuger 13 kVA</li>
<li>LED-Beleuchtungsanlage am Aufbau</li>
<li>Digitalfunk TETRA BOS</li>
</ul>
<h2>Fahrzeugübergabe</h2>
<p>Das Fahrzeug wurde im Rahmen einer kleinen Feierstunde offiziell übergeben. Bürgermeisterin <em>Claudia Wieners</em> überreichte symbolisch den Schlüssel an Wehrleiter Thomas Kremer. „Dieses Fahrzeug ist eine Investition in die Sicherheit unserer Bürgerinnen und Bürger", so Wieners.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1558618047-f4e80edb2fd8?w=800&q=80',
                ],
            ],
            [
                'title' => 'Atemschutzlehrgang erfolgreich absolviert',
                'slug'  => 'atemschutzlehrgang-erfolgreich',
                'publicity' => 1,
                'static' => false,
                'body' => '<p>Vier Kameradinnen und Kameraden der Feuerwehr Merzenich haben erfolgreich den <strong>Lehrgang Atemschutzgeräteträger</strong> an der Kreisausbildungsstätte des Kreises Düren absolviert.</p>
<h2>Teilnehmerinnen und Teilnehmer</h2>
<p>An dem einwöchigen Lehrgang nahmen teil:</p>
<ul>
<li>Lena Becker (LG Merzenich)</li>
<li>Tobias Neumann (LG Merzenich)</li>
<li>Katharina Lorenz (LG Golzheim)</li>
<li>Patrick Stein (LG Morschenich)</li>
</ul>
<h2>Inhalte</h2>
<p>Der Lehrgang umfasste Theorie und Praxis zur Handhabung von Pressluftatmern, zur Physiologie beim Atemschutzgeräteträger, Hitzegewöhnung sowie realitätsnahe Übungen im Atemschutzübungscontainer. Allen vier Teilnehmenden ist herzlich zu gratulieren!</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1584432810601-6c7f27d2362b?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Tag der offenen Tür – Ihr seid eingeladen!',
                'slug'  => 'tag-der-offenen-tuer-2026',
                'publicity' => 1,
                'static' => false,
                'body' => '<p>Am <strong>28. Juni 2026</strong> öffnet die Feuerwehr Merzenich ihre Tore für alle Bürgerinnen und Bürger! Von 10 bis 17 Uhr könnt ihr hinter die Kulissen der Feuerwehr schauen, unsere Fahrzeuge besichtigen und live Vorführungen erleben.</p>
<h2>Programm</h2>
<ul>
<li>🚒 Fahrzeugbesichtigung und -erklärungen für Groß und Klein</li>
<li>💧 Löschvorführungen mit dem Wasserwerfer</li>
<li>🪜 Einblicke in die Atemschutzausrüstung</li>
<li>🧯 Feuerlöscher selbst ausprobieren</li>
<li>🍖 Grillstand und Kaffee & Kuchen</li>
<li>👶 Kinderschminken und Hüpfburg</li>
</ul>
<blockquote>Der Eintritt ist frei – wir freuen uns auf euren Besuch!</blockquote>
<p>Für Fragen steht euch unser Pressewart unter <a href="mailto:presse@feuerwehr-merzenich.de">presse@feuerwehr-merzenich.de</a> zur Verfügung.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Gemeinsame Übung mit dem DRK Ortsverband Merzenich',
                'slug'  => 'gemeinsame-uebung-drk-merzenich',
                'publicity' => 1,
                'static' => false,
                'body' => '<p>Die Löschgruppe Merzenich und der DRK-Ortsverband Merzenich führten eine gemeinsame Abend­übung durch. Szenario: ein schwerer Verkehrsunfall mit mehreren Verletzten auf der Gemeindestraße K33.</p>
<h2>Übungsablauf</h2>
<p>Die Feuerwehr übernahm die technische Rettung einer eingeklemmten Person, die anschließend vom DRK-Team versorgt und transportiert wurde. Besonderes Augenmerk lag auf der <strong>Kommunikation zwischen den Einsatzkräften</strong> sowie der gemeinsamen Patientenübergabe.</p>
<p>Die Übung wurde im Anschluss gemeinsam ausgewertet. Beide Organisationen zogen ein positives Fazit und vereinbarten, die gemeinsamen Übungen künftig regelmäßig durchzuführen.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1609220136736-443140cfeaa8?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=800&q=80',
                ],
            ],
        ];

        foreach ($newsItems as $data) {
            $news = News::create([
                'title'     => $data['title'],
                'slug'      => $data['slug'],
                'body'      => $data['body'],
                'user_id'   => $user->id,
                'publicity' => $data['publicity'],
                'static'    => $data['static'],
            ]);

            if ($data['thumb_url']) {
                try {
                    $news->addMediaFromUrl($data['thumb_url'])
                        ->toMediaCollection('thumbnail');
                } catch (\Exception $e) {
                    // skip
                }
            }

            foreach ($data['gallery_urls'] as $url) {
                try {
                    $news->addMediaFromUrl($url)
                        ->toMediaCollection('gallery');
                } catch (\Exception $e) {
                    // skip
                }
            }
        }

        $this->command->info('Demo-Daten erfolgreich erstellt.');
    }
}


