<?php

namespace App\Providers\Filament;

use App\Models\User;
use App\Utils\SidebarNavigation;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Facades\FilamentTimezone;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use SLNE\FilamentAuthorization\FilamentAuthorizationPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        DatabaseNotifications::pollingInterval(null);

        FilamentTimezone::set("Europe/Berlin");

        TextColumn::configureUsing(
            fn(TextColumn $column) => $column
                ->timezone("Europe/Berlin")
                ->placeholder("-")
        );

        TextEntry::configureUsing(
            fn(TextEntry $entry) => $entry
                ->timezone("Europe/Berlin")
                ->placeholder("-")
        );

        Fieldset::configureUsing(fn(Fieldset $fieldset) => $fieldset
            ->columnSpanFull());

        Grid::configureUsing(fn(Grid $grid) => $grid
            ->columnSpanFull());

        Section::configureUsing(fn(Section $section) => $section
            ->columnSpanFull());

        Table::configureUsing(function (Table $table) {
            $table->filtersLayout(FiltersLayout::Modal);
            $table->striped();
            $table->deferLoading();
            $table->extremePaginationLinks();
            $table->defaultPaginationPageOption(25);
            $table->paginated([
                5,
                10,
                25,
                50,
                100,
                200,
            ]);
        });

        return $panel
            ->default()
            ->id("admin")
            ->path("/admin")
            ->login()
            ->maxContentWidth(Width::Full)
            ->readOnlyRelationManagersOnResourceViewPagesByDefault(false)
            ->sidebarFullyCollapsibleOnDesktop()
            ->globalSearchKeyBindings(["mod+k", 'command+k', 'ctrl+k'])
            ->globalSearchFieldKeyBindingSuffix()
            ->topbar(false)
            ->colors([
                'primary' => Color::Red,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugin(
                FilamentAuthorizationPlugin::make()
                    ->withAuthHome("filament.admin.auth.login")
                    ->withNavigationGroup(SidebarNavigation::Admin)
                    ->withNavigationSortIndex(100)
                    ->withUserModel(User::class)
            )
            ->favicon(asset('images/logo/favicon.ico'))
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages');
    }
}
