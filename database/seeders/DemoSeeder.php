<?php

namespace Database\Seeders;

use App\Models\Commitment;
use App\Models\CommitmentType;
use App\Models\News;
use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Database\Eloquent\Model::unguard();
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
        $stationGolzheim = Station::firstOrCreate(['name' => 'Golzheim'], ['slug' => 'golzheim']);
        $stationMorschenich = Station::firstOrCreate(['name' => 'Morschenich'], ['slug' => 'morschenich']);

        $typeBrand = CommitmentType::firstOrCreate(['name' => 'Brand'], ['slug' => 'brand', 'short' => 'B', 'aaoName' => 'Brand']);
        $typeTHW = CommitmentType::firstOrCreate(['name' => 'Technische Hilfe'], ['slug' => 'technische-hilfe', 'short' => 'TH', 'aaoName' => 'Technische Hilfe']);
        $typeFehlalarm = CommitmentType::firstOrCreate(['name' => 'Fehlalarm'], ['slug' => 'fehlalarm', 'short' => 'FA', 'aaoName' => 'Fehlalarm']);
        $typeUmwelt = CommitmentType::firstOrCreate(['name' => 'Umwelt'], ['slug' => 'umwelt', 'short' => 'U', 'aaoName' => 'Umwelt']);

        // ── EINSÄTZE ─────────────────────────────────────────────────────────────

        $commitments = [
            [
                'title' => 'Wohnungsbrand in der Dürener Straße',
                'slug' => 'wohnungsbrand-duerener-strasse',
                'start' => now()->subDays(3)->setTime(14, 27),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
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
                'slug' => 'verkehrsunfall-b56-eingeklemmte-person',
                'start' => now()->subDays(10)->setTime(7, 12),
                'type' => $typeTHW,
                'stations' => [$stationMerzenich, $stationGolzheim],
                'publicity' => 2,
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
                'slug' => 'oelspur-l33-merzenich-golzheim',
                'start' => now()->subDays(18)->setTime(11, 45),
                'type' => $typeUmwelt,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
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
                'slug' => 'fehlalarm-rauchmelder-schule',
                'start' => now()->subDays(25)->setTime(9, 3),
                'type' => $typeFehlalarm,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<p>Um 09:03 Uhr wurde die Löschgruppe Merzenich durch ausgelöste Brandmeldeanlage zur Grundschule Merzenich alarmiert. Nach Überprüfung des Gebäudes konnte kein Feuer oder Rauch festgestellt werden. Der Rauchmelder hatte vermutlich aufgrund von Kochgerüchen aus der schuleigenen Küche ausgelöst. Die Schule wurde nicht evakuiert.</p>
<p>Einsatzdauer: 22 Minuten.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Waldbrand – Grünfläche am Braunkohlerandgebiet',
                'slug' => 'waldbrand-braunkohlerandgebiet',
                'start' => now()->subDays(45)->setTime(16, 30),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich, $stationMorschenich],
                'publicity' => 2,
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

            // ── 2025 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Kellerbrand Mehrfamilienhaus Golzheimer Straße',
                'slug' => 'kellerbrand-golzheimer-strasse-2025',
                'start' => \Carbon\Carbon::create(2025, 11, 14, 2, 38),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich, $stationGolzheim],
                'publicity' => 2,
                'body' => '<h2>Nachtlicher Alarm</h2>
<p>In den frühen Morgenstunden des 14. November 2025 wurde die Feuerwehr Merzenich zu einem Kellerbrand in einem sechsgeschossigen Mehrfamilienhaus alarmiert. Dichte Rauchentwicklung hatte bereits das Treppenhaus verraucht und mehrere Bewohner auf ihren Balkonen eingeschlossen.</p>
<h2>Menschenrettung</h2>
<p>Parallel zur Brandbekämpfung wurden über die Drehleiter vier Personen aus dem 3. und 4. Obergeschoss gerettet. Alle Bewohner wurden unverletzt aus dem Gebäude gebracht und vom Rettungsdienst betreut.</p>
<h2>Brandbekämpfung</h2>
<ul>
<li>Angriff über Treppenhaus mit Hochdruckrohr</li>
<li>Zweiter Trupp zur Personensuche im Keller</li>
<li>Lüfter zur Entrauchung des Treppenhauses</li>
<li>Einsatzdauer: 3 Stunden 20 Minuten</li>
</ul>',
                'thumb_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Sturmschäden nach Orkan „Bernd" – Bäume auf Fahrbahn',
                'slug' => 'sturmschaeden-orkan-bernd-2025',
                'start' => \Carbon\Carbon::create(2025, 8, 3, 18, 55),
                'type' => $typeTHW,
                'stations' => [$stationMerzenich, $stationGolzheim, $stationMorschenich],
                'publicity' => 2,
                'body' => '<h2>Sturmtief über der Region</h2>
<p>Das Sturmtief „Bernd" sorgte am Abend des 3. August 2025 für zahlreiche Einsätze im gesamten Gemeindegebiet Merzenich. Innerhalb von zwei Stunden rückten alle drei Löschgruppen zu insgesamt 14 Einsätzen aus.</p>
<h2>Schwerpunkte</h2>
<ul>
<li>7× Bäume auf Fahrbahn – Kettensägen-Einsatz</li>
<li>3× abgedeckte Dächer – Erste Sicherung mit Planen</li>
<li>2× vollgelaufene Keller – Tauchpumpen</li>
<li>2× umgestürzte Zäune auf Kreisstraßen</li>
</ul>
<blockquote>Die Kräfte aller drei Löschgruppen arbeiteten koordiniert unter Führung des Einsatzleiters vom Dienst.</blockquote>
<p>Gesamtstärke: 42 Einsatzkräfte. Einsätze abgeschlossen um 23:30 Uhr.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Fahrzeugbrand auf der A4 – PKW in Vollbrand',
                'slug' => 'fahrzeugbrand-a4-2025',
                'start' => \Carbon\Carbon::create(2025, 5, 22, 13, 17),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<h2>Brand auf der Autobahn</h2>
<p>Auf der A4 in Fahrtrichtung Köln brannte ein PKW im Mittelstreifen in Vollbrand. Der Fahrer konnte das Fahrzeug rechtzeitig verlassen und blieb unverletzt. Die Feuerwehr Merzenich sicherte die Einsatzstelle und löschte das Fahrzeug mit einem C-Rohr ab.</p>
<p>Einsatzdauer: 45 Minuten. Eingesetzte Kräfte: 10 Kameraden, HLF 20.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Fehlalarm – BMA Gewerbepark Merzenich',
                'slug' => 'fehlalarm-bma-gewerbepark-2025',
                'start' => \Carbon\Carbon::create(2025, 3, 7, 10, 42),
                'type' => $typeFehlalarm,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<p>Automatische Brandmeldeanlage im Gewerbepark Merzenich löste aus. Nach Überprüfung aller Bereiche kein Feuer festgestellt. Vermutliche Ursache: Staubentwicklung bei Umbauarbeiten. Einsatzdauer: 28 Minuten.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2024 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Gebäudebrand landwirtschaftlicher Betrieb – Scheunenbrand',
                'slug' => 'scheunenbrand-2024',
                'start' => \Carbon\Carbon::create(2024, 9, 1, 20, 11),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich, $stationGolzheim, $stationMorschenich],
                'publicity' => 2,
                'body' => '<h2>Großeinsatz in der Landwirtschaft</h2>
<p>Eine Scheune mit ca. 800 m² Grundfläche geriet am Abend des 1. September 2024 in Brand. Das Gebäude stand bei Eintreffen der Feuerwehr bereits in Vollbrand. Da angrenzende Gebäude und eine Biogasanlage in unmittelbarer Gefahr waren, wurde umgehend ein Großaufgebot alarmiert.</p>
<h2>Taktisches Vorgehen</h2>
<p>Der Einsatzleiter entschied sich aufgrund der Einsturzgefahr für einen Außenangriff. Vier C-Rohre sowie ein Wasserwerfer wurden eingesetzt, um die Ausbreitung auf die benachbarte Biogasanlage zu verhindern.</p>
<h2>Wasserversorgung</h2>
<p>Da die örtlichen Hydranten die benötigte Löschwassermenge nicht bereitstellen konnten, wurde eine Pendelversorgung über drei Tanklöschfahrzeuge aus dem nahegelegenen Teich eingerichtet.</p>
<ul>
<li>Eingesetzte Kräfte: 58 Einsatzkräfte aus 6 Löschgruppen</li>
<li>Einsatzdauer: 6 Stunden 45 Minuten</li>
<li>Sachschaden: ca. 250.000 €</li>
</ul>',
                'thumb_url' => 'https://images.unsplash.com/photo-1602615576820-ea14c4d4c6c8?w=800&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1542044896530-4ea88b13c1be?w=800&q=80',
                ],
            ],
            [
                'title' => 'Unwettereinsatz – Überflutete Unterführung',
                'slug' => 'unwetter-unterfuehrung-2024',
                'start' => \Carbon\Carbon::create(2024, 7, 18, 16, 30),
                'type' => $typeTHW,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<p>Starkregen überflutete die Bahnunterführung an der Kirchstraße bis zu einer Tiefe von 1,20 m. Ein PKW-Fahrer war mit seinem Fahrzeug stecken geblieben und musste durch die Feuerwehr gerettet werden. Die Pumpen waren rund 2 Stunden im Einsatz bis die Durchfahrt wieder freigegeben werden konnte.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Tierrettung – Pferd in Jauchegrube eingebrochen',
                'slug' => 'tierrettung-pferd-2024',
                'start' => \Carbon\Carbon::create(2024, 4, 12, 14, 5),
                'type' => $typeTHW,
                'stations' => [$stationMerzenich, $stationGolzheim],
                'publicity' => 2,
                'body' => '<h2>Ungewöhnlicher Einsatz</h2>
<p>Ein Reitpferd war auf einem landwirtschaftlichen Hof in eine nicht gesicherte Jauchegrube eingebrochen und konnte sich nicht selbst befreien. Die Feuerwehr arbeitete gemeinsam mit einem Tierarzt und einem Spezialisten für Tierrettung an der Bergung.</p>
<h2>Rettungsmaßnahmen</h2>
<p>Mit Hilfe von Hebegeschirr, Gurten und einem Kran des THW konnte das Tier nach etwa 90 Minuten unverletzt aus der Grube gehoben werden. Das Pferd wurde anschließend tierärztlich versorgt.</p>
<blockquote>Ein ungewöhnlicher, aber für alle Beteiligten sehr befriedigender Einsatz.</blockquote>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Jahreswechsel – Silvester-Einsätze 2023/2024',
                'slug' => 'silvester-einsaetze-2023-2024',
                'start' => \Carbon\Carbon::create(2024, 1, 1, 0, 15),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<p>In der Silvesternacht rückte die Feuerwehr Merzenich zu drei Einsätzen aus: zwei Mülltonnenbränden und einem brennenden Weihnachtsbaum auf einem Balkon. Alle Einsätze konnten schnell abgearbeitet werden. Einsatzkräfte: 12, Dauer je Einsatz 15–25 Minuten.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2023 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Wohnungsbrand mit Menschenrettung – Am Bruchweg',
                'slug' => 'wohnungsbrand-bruchweg-2023',
                'start' => \Carbon\Carbon::create(2023, 12, 3, 3, 52),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich, $stationGolzheim],
                'publicity' => 2,
                'body' => '<h2>Nachtlicher Wohnungsbrand</h2>
<p>Mitten in der Nacht brannte eine Wohnung im zweiten Obergeschoss eines Reihenhausverbundes. Eine ältere Person war im Schlafzimmer eingeschlossen und musste über die Drehleiter gerettet werden. Die Person erlitt eine Rauchgasintoxikation und wurde ins Krankenhaus Düren eingeliefert.</p>
<h2>Ausbreitung verhindert</h2>
<p>Durch den schnellen Einsatz der Atemschutztrupps konnte eine Ausbreitung auf die angrenzenden Reihenhäuser verhindert werden. Die betroffene Wohnung ist nicht mehr bewohnbar.</p>
<p>Einsatzdauer: 2 Stunden 50 Minuten. Eingesetzte Kräfte: 28.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Gasaustritt – Wohngebiet Morschenich',
                'slug' => 'gasaustritt-morschenich-2023',
                'start' => \Carbon\Carbon::create(2023, 6, 27, 11, 10),
                'type' => $typeTHW,
                'stations' => [$stationMorschenich, $stationMerzenich],
                'publicity' => 2,
                'body' => '<p>Bei Erdarbeiten wurde eine Gasleitung beschädigt. Das Wohngebiet wurde weiträumig abgesperrt und acht Anwohner evakuiert. Der Netzbetreiber Westnetz konnte die Leitung nach 45 Minuten absperren. Vorsorglich wurde der Bereich auf Gaskonzentration gemessen und für unbedenklich erklärt.</p>
<p>Eingesetzte Kräfte: 16, Einsatzdauer: 1 Stunde 30 Minuten.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Containerbrand Recyclinghof',
                'slug' => 'containerbrand-recyclinghof-2023',
                'start' => \Carbon\Carbon::create(2023, 3, 15, 9, 30),
                'type' => $typeBrand,
                'stations' => [$stationMerzenich],
                'publicity' => 2,
                'body' => '<p>Auf dem Recyclinghof Merzenich geriet ein Altpapier-Container in Brand. Das Feuer konnte durch einen gezielten Einsatz eines B-Rohrs rasch gelöscht werden. Der Container wurde mit einer Schaufel aufgebrochen und der Inhalt vollständig abgelöscht. Sachschaden: ca. 1.500 €.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2022 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Hochwassereinsatz – Keller und Straßen überflutet',
                'slug' => 'hochwasser-2022',
                'start' => \Carbon\Carbon::create(2022, 8, 14, 8, 0),
                'type' => $typeTHW,
                'stations' => [$stationMerzenich, $stationGolzheim, $stationMorschenich],
                'publicity' => 2,
                'body' => '<h2>Extremniederschläge im August 2022</h2>
<p>Nach extremen Regenfällen in der Nacht zum 14. August 2022 waren weite Teile des Gemeindegebiets überflutet. Die Feuerwehr rückte zu insgesamt 23 Einsätzen aus – hauptsächlich überfluteten Kellern und blockierten Straßen.</p>
<h2>Koordination</h2>
<p>Im Gerätehaus Merzenich wurde ein Führungsstab eingerichtet. Alle verfügbaren Tauchpumpen wurden im Rotationsprinzip eingesetzt. Unterstützung kam vom THW Ortsverband Düren mit drei Hochleistungspumpen.</p>
<ul>
<li>23 Einsätze innerhalb von 14 Stunden</li>
<li>Maximal 55 Kräfte zeitgleich im Einsatz</li>
<li>Ca. 4,2 Millionen Liter Wasser abgepumpt</li>
</ul>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
            [
                'title' => 'Brand Dachstuhl – Einfamilienhaus Girbelsrath',
                'slug' => 'dachstuhlbrand-girbelsrath-2022',
                'start' => \Carbon\Carbon::create(2022, 5, 3, 15, 44),
                'type' => $typeBrand,
                'stations' => [$stationMorschenich, $stationMerzenich],
                'publicity' => 2,
                'body' => '<h2>Dachstuhlbrand nach Blitzeinschlag</h2>
<p>Nach einem Gewitter wurden Rauch und Flammen aus dem Dachstuhl eines Einfamilienhauses gemeldet. Ein Blitz hatte vermutlich die Holzkonstruktion entzündet. Die Familie konnte das Haus rechtzeitig verlassen.</p>
<p>Der Dachstuhl musste vollständig geöffnet werden, um versteckte Glutnester abzulöschen. Einsatzdauer: 3 Stunden 10 Minuten, 24 Kräfte im Einsatz.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?w=800&q=80',
                'gallery_urls' => [],
            ],
        ];

        foreach ($commitments as $data) {
            $commitment = Commitment::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'body' => $data['body'],
                'start' => $data['start'],
                'user_id' => $user->id,
                'commitment_type_id' => $data['type']->id,
                'publicity' => $data['publicity'],
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
                'slug' => 'jahreshauptversammlung-2025',
                'publicity' => 2,
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
                'slug' => 'neues-hlf-20-loeschgruppe-merzenich',
                'publicity' => 2,
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
                'slug' => 'atemschutzlehrgang-erfolgreich',
                'publicity' => 2,
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
                'slug' => 'tag-der-offenen-tuer-2026',
                'publicity' => 2,
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
                'slug' => 'gemeinsame-uebung-drk-merzenich',
                'publicity' => 2,
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

            // ── 2025 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Neue Atemschutzübungsanlage in Betrieb genommen',
                'slug' => 'atemschutzuebungsanlage-2025',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2025, 10, 5),
                'body' => '<p>Der Kreis Düren hat im Oktober 2025 eine neue Atemschutzübungsanlage am Kreisfeuerwehrzentrum eingeweiht. Die Anlage ermöglicht realitätsnahe Übungen unter vollständiger Nullsicht und erhöhter Temperatur.</p>
<h2>Vorteile der neuen Anlage</h2>
<ul>
<li>Modularer Aufbau – konfigurierbar für verschiedene Szenarien</li>
<li>Integrierte Wärmebildkameras zur Auswertung</li>
<li>Maximale Temperatur: 60 °C</li>
<li>Gleichzeitige Übung von bis zu 4 Trupps möglich</li>
</ul>
<p>Kameradinnen und Kameraden aus Merzenich nehmen bereits an den ersten Übungsterminen teil.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1584432810601-6c7f27d2362b?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Feuerwehr Merzenich erhält Digitalfunk-Upgrade',
                'slug' => 'digitalfunk-upgrade-2025',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2025, 4, 20),
                'body' => '<p>Im Rahmen der Erneuerung der Kommunikationsinfrastruktur des Kreises Düren wurden alle Fahrzeuge der Feuerwehr Merzenich mit neuen TETRA-Digitalfunkgeräten der zweiten Generation ausgestattet. Die neuen Geräte bieten verbesserte Sprachqualität, eine längere Akkulaufzeit und integriertes GPS-Tracking für die Einsatzleitzentrale.</p>
<blockquote>Moderne Kommunikation rettet Leben – wir freuen uns über das Upgrade.</blockquote>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2024 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Jahreshauptversammlung 2024 – Rekordjahr mit 94 Einsätzen',
                'slug' => 'jahreshauptversammlung-2024',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2024, 2, 10),
                'body' => '<h2>Rekordjahr 2023</h2>
<p>Die Jahreshauptversammlung 2024 stand ganz im Zeichen eines außergewöhnlichen Einsatzjahres: Mit 94 Einsätzen verzeichnete die Feuerwehr Merzenich 2023 die höchste Zahl seit ihrer Gründung.</p>
<h2>Beförderungen</h2>
<ul>
<li><strong>Zum Oberfeuerwehrmann:</strong> Felix Müller, Jana Braun</li>
<li><strong>Zum Brandmeister:</strong> Maximilian Krüger</li>
</ul>
<h2>Beschaffungen 2024</h2>
<p>Für das laufende Jahr wurden die Beschaffung eines neuen Mannschaftstransportfahrzeugs sowie die Erneuerung der Atemschutzgeräte beschlossen. Das Budget wurde von der Gemeinde Merzenich bereitgestellt.</p>',
                'thumb_url' => 'https://images.unsplash.com/photo-1560523159-4a9692d222ef?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Grundlehrgang 2024 – Sechs neue Einsatzkräfte',
                'slug' => 'grundlehrgang-2024',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2024, 9, 28),
                'body' => '<p>Sechs neue Kameradinnen und Kameraden haben im September 2024 erfolgreich den <strong>Grundlehrgang Feuerwehr</strong> an der Kreisausbildungsstätte abgeschlossen. Damit wächst die aktive Stärke der Feuerwehr Merzenich auf insgesamt 108 Einsatzkräfte.</p>
<p>Herzlichen Glückwunsch an alle Absolventinnen und Absolventen!</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2023 ─────────────────────────────────────────────────────────────
            [
                'title' => '40 Jahre Jugendfeuerwehr Merzenich – Festakt und Zeltlager',
                'slug' => '40-jahre-jugendfeuerwehr-2023',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2023, 7, 15),
                'body' => '<h2>Ein runder Geburtstag</h2>
<p>Die Jugendfeuerwehr Merzenich feierte ihr 40-jähriges Bestehen mit einem dreitägigen Zeltlager auf dem Gelände des Gerätehauses Merzenich. Über 60 Kinder und Jugendliche sowie zahlreiche ehemalige Mitglieder nahmen an den Feierlichkeiten teil.</p>
<h2>Programm</h2>
<ul>
<li>Wettkampf „Jugendflamme Stufe 3"</li>
<li>Besuch des Kreisfeuerwehrzentrums Düren</li>
<li>Lagerfeuer und Grillen am Samstag</li>
<li>Festakt mit Ehrungen langjähriger Jugendfeuerwehrwarte</li>
</ul>
<blockquote>40 Jahre Jugendfeuerwehr – 40 Jahre Nachwuchs für die Sicherheit unserer Gemeinde.</blockquote>',
                'thumb_url' => 'https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Spende: Lokales Unternehmen unterstützt Feuerwehr mit 5.000 €',
                'slug' => 'spende-unternehmen-2023',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2023, 3, 22),
                'body' => '<p>Die Firma Braunkohle-Logistik GmbH aus Merzenich hat der Feuerwehr Merzenich eine Spende in Höhe von <strong>5.000 Euro</strong> überreicht. Mit dem Geld soll neue Schutzausrüstung für die Jugendfeuerwehr beschafft werden. Wehrleiter Thomas Kremer bedankte sich herzlich bei der Geschäftsführung für die großzügige Unterstützung.</p>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],

            // ── 2022 ─────────────────────────────────────────────────────────────
            [
                'title' => 'Fahrzeugweihe: Neues TLF 3000 für die Löschgruppe Morschenich',
                'slug' => 'fahrzeugweihe-tlf-morschenich-2022',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2022, 6, 18),
                'body' => '<p>Die Löschgruppe Morschenich hat ein neues Tanklöschfahrzeug TLF 3000 in Dienst gestellt. Das Fahrzeug auf MAN-Fahrgestell verfügt über einen 3.000-Liter-Wassertank und modernste Lösch- und Sicherheitstechnik. Bei der feierlichen Schlüsselübergabe waren Vertreter der Gemeinde, des Kreises sowie zahlreiche Kameradinnen und Kameraden anwesend.</p>
<h2>Technische Daten</h2>
<ul>
<li>Fahrgestell: MAN TGM</li>
<li>Löschwassertank: 3.000 Liter</li>
<li>Schnellangriffseinrichtung 30 m</li>
<li>Baujahr: 2022</li>
</ul>',
                'thumb_url' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&q=80',
                'gallery_urls' => [],
            ],
            [
                'title' => 'Jahreshauptversammlung 2022 – Rückblick auf ein turbulentes Jahr',
                'slug' => 'jahreshauptversammlung-2022',
                'publicity' => 2, 'static' => false,
                'created_at' => \Carbon\Carbon::create(2022, 2, 5),
                'body' => '<p>Die Jahreshauptversammlung 2022 fand nach zweijähriger Corona-bedingter Pause wieder in Präsenz statt. Wehrleiter Thomas Kremer blickte auf ein außergewöhnliches Jahr zurück, das durch die Hochwasser-Katastrophe und einen Rekordhochlauf an Einsätzen geprägt war.</p>
<h2>Zahlen 2021</h2>
<ul>
<li>Gesamteinsätze: 78</li>
<li>Brandeinsätze: 29</li>
<li>Technische Hilfeleistungen: 31</li>
<li>Fehleinsätze: 18</li>
</ul>',
                'thumb_url' => null,
                'gallery_urls' => [],
            ],
        ];

        foreach ($newsItems as $data) {
            $news = News::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'body' => $data['body'],
                'user_id' => $user->id,
                'publicity' => $data['publicity'],
                'static' => $data['static'],
                'created_at' => $data['created_at'] ?? now(),
                'updated_at' => $data['created_at'] ?? now(),
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


