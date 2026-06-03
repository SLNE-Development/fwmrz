<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlugHelper
{
    /**
     * Generate a unique slug for a given table.
     *
     * @param  string       $source   The source string (title, name, …)
     * @param  string       $table    The database table to check against
     * @param  int|null     $ignoreId Existing record ID to exclude (for updates)
     * @param  string       $column   Slug column name (default: 'slug')
     */
    public static function unique(
        string $source,
        string $table,
        ?int $ignoreId = null,
        string $column = 'slug'
    ): string {
        $base = Str::slug($source);
        $slug = $base;
        $counter = 2;

        while (true) {
            $query = DB::table($table)->where($column, $slug);

            if ($ignoreId !== null) {
                $query->where('id', '!=', $ignoreId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = "{$base}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}

