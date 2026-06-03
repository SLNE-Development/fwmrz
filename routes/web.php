<?php

use App\Http\Controllers\CommitmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Startseite
Route::get('/', [HomeController::class, 'index'])->name('home');

// Einsätze
Route::get('/einsaetze', [CommitmentController::class, 'index'])->name('einsaetze.index');
Route::get('/einsaetze/{commitment:slug}', [CommitmentController::class, 'show'])->name('einsaetze.show');

// News / Aktuelles
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Static pages
Route::get('/organisation', [PageController::class, 'organisation'])->name('organisation');
Route::get('/mitmachen',    [PageController::class, 'mitmachen'])->name('mitmachen');
Route::get('/kontakt',      [PageController::class, 'kontakt'])->name('kontakt');
Route::post('/kontakt',     [PageController::class, 'kontaktSend'])->name('kontakt.send');
Route::get('/impressum',    [PageController::class, 'impressum'])->name('impressum');
Route::get('/datenschutz',  [PageController::class, 'datenschutz'])->name('datenschutz');
