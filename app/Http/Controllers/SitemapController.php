<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use App\Models\News;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Symfony\Component\HttpFoundation\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $sitemap = Sitemap::create();

        // ── Statische Seiten ─────────────────────────────────────────────────
        $sitemap->add(
            Url::create(url('/'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(1.0)
                ->setLastModificationDate(Carbon::now())
        );

        foreach ([
                     ['route' => 'einsaetze.index', 'freq' => Url::CHANGE_FREQUENCY_DAILY, 'prio' => 0.9],
                     ['route' => 'news.index', 'freq' => Url::CHANGE_FREQUENCY_DAILY, 'prio' => 0.9],
                     ['route' => 'organisation', 'freq' => Url::CHANGE_FREQUENCY_MONTHLY, 'prio' => 0.7],
                     ['route' => 'mitmachen', 'freq' => Url::CHANGE_FREQUENCY_MONTHLY, 'prio' => 0.7],
                     ['route' => 'kontakt', 'freq' => Url::CHANGE_FREQUENCY_YEARLY, 'prio' => 0.5],
                 ] as $page) {
            $sitemap->add(
                Url::create(route($page['route']))
                    ->setChangeFrequency($page['freq'])
                    ->setPriority($page['prio'])
            );
        }

        // ── Einsätze ─────────────────────────────────────────────────────────
        Commitment::query()
            ->where('publicity', 2)
            ->select(['id', 'slug', 'updated_at'])
            ->orderByDesc('start')
            ->each(function (Commitment $commitment) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('einsaetze.show', $commitment->slug))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.7)
                        ->setLastModificationDate($commitment->updated_at)
                );
            });

        // ── News ─────────────────────────────────────────────────────────────
        News::query()
            ->where('publicity', 2)
            ->select(['id', 'slug', 'updated_at'])
            ->orderByDesc('created_at')
            ->each(function (News $news) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('news.show', $news->slug))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.8)
                        ->setLastModificationDate($news->updated_at)
                );
            });

        return $sitemap->toResponse(request());
    }
}

