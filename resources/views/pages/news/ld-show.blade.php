@php
$ld = [
'@context' => 'https://schema.org',
'@type' => 'NewsArticle',

'headline' => $news->title,

'description' => Str::limit(
strip_tags($news->body ?? ''),
160
),

'datePublished' => $news->created_at->toIso8601String(),
'dateModified' => $news->updated_at->toIso8601String(),

'image' => $news->hasMedia('thumbnail')
? $news->getFirstMediaUrl('thumbnail')
: asset('images/hero/hero.jpg'),

'url' => route('news.show', $news->slug),

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
'name' => 'Aktuelles',
'item' => route('news.index'),
],
[
'@type' => 'ListItem',
'position' => 3,
'name' => $news->title,
'item' => route('news.show', $news->slug),
],
],
],
];
@endphp

<script type="application/ld+json">
  @json($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
</script>