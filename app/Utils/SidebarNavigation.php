<?php

namespace App\Utils;

use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum SidebarNavigation: int implements HasLabel, HasIcon
{
    case Management = 1;
    case Admin = 2;

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Management => "heroicon-o-home",
            self::Admin => "heroicon-o-shield-check",
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Management => "Management",
            self::Admin => "Admin",
        };
    }
}