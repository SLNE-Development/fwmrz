@php
$ld = [
'@context' => 'https://schema.org',
'@type' => 'Article',

'headline' => $commitment->title,

'description' => Str::limit(
strip_tags($commitment->body ?? ''),
160
),

'datePublished' => $commitment->start->toIso8601String(),
'dateModified' => $commitment->updated_at->toIso8601String(),

'image' => $commitment->hasMedia('thumbnail')
? $commitment->getFirstMediaUrl('thumbnail')
: asset('images/hero/hero.jpg'),

'url' => route('einsaetze.show', $commitment->slug),

'publisher' => [
'@type' => 'Organization',
'name' => 'Freiwillige Feuerwehr Merzenich',
'url' => url('/'),
],

'breadcrumb' => [
'@type' => 'BreadcrumbList',
'itemListElement' => [
[
'@type' => 'ListItem',
'position' => 1,
'name' => 'Startseite',
'item' => url('/'),
],
[
'@type' => 'ListItem',
'position' => 2,
'name' => 'Einsätze',
'item' => route('einsaetze.index'),
],
[
'@type' => 'ListItem',
'position' => 3,
'name' => $commitment->title,
'item' => route('einsaetze.show', $commitment->slug),
],
],
],
];
@endphp

<script type="application/ld+json">
  @json($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
</script>