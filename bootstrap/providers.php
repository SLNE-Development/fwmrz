<?php

use SLNE\FilamentAuthorization\Providers\FilamentAuthServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    FilamentAuthServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
];
