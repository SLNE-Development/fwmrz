@php
$ld = [
'@context' => 'https://schema.org',
'@type' => 'FireStation',
'name' => 'Freiwillige Feuerwehr Merzenich',
'url' => url('/'),
'logo' => asset('images/logo/logo.png'),
'image' => asset('images/hero/hero.jpg'),
'description' => 'Freiwillige Feuerwehr Merzenich mit vier Löschgruppen im Gemeindegebiet.',

'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Arnoldsweilerweg 1',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
],

'department' => [
[
'@type' => 'FireStation',
'name' => 'Löschgruppe Merzenich',
'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Arnoldsweilerweg 1',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
]
],
[
'@type' => 'FireStation',
'name' => 'Löschgruppe Girbelsrath',
'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Dechant-Fabry-Straße',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
]
],
[
'@type' => 'FireStation',
'name' => 'Löschgruppe Golzheim',
'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Johann-Kaspar-Kratz-Straße 13',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
]
],
[
'@type' => 'FireStation',
'name' => 'Löschgruppe Morschenich',
'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Ellener Allee',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
]
],
],

'parentOrganization' => [
'@type' => 'GovernmentOrganization',
'name' => 'Gemeinde Merzenich',
'address' => [
'@type' => 'PostalAddress',
'streetAddress' => 'Valdersweg 1',
'postalCode' => '52399',
'addressLocality' => 'Merzenich',
'addressCountry' => 'DE',
]
],

'sameAs' => [
'https://www.facebook.com/Freiwillige-Feuerwehr-Merzenich-394835230701997/',
'https://www.instagram.com/feuerwehr_merzenich/'
]
];
@endphp

<script type="application/ld+json">
  @json($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
</script>