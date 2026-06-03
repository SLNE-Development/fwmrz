<?php

namespace App\Policies;

use App\Models\News;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<News>
 */
class NewsPolicy extends FilamentPolicy
{
    public static string $model = News::class;
    public static string $permissionPrefix = 'news';
}

