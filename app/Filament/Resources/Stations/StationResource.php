<?php

namespace App\Filament\Resources\Stations;

use App\Filament\Resources\Stations\Pages\CreateStation;
use App\Filament\Resources\Stations\Pages\EditStation;
use App\Filament\Resources\Stations\Pages\ListStations;
use App\Filament\Resources\Stations\Pages\ViewStation;
use App\Filament\Resources\Stations\RelationManagers\CommitmentsRelationManager;
use App\Filament\Resources\Stations\Schemas\StationForm;
use App\Filament\Resources\Stations\Schemas\StationInfolist;
use App\Filament\Resources\Stations\Tables\StationsTable;
use App\Models\Station;
use App\Utils\SidebarNavigation;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class StationResource extends Resource
{
    protected static ?string $model = Station::class;
    protected static string|UnitEnum|null $navigationGroup = SidebarNavigation::Management;

    protected static ?string $label = "Kraft";
    protected static ?string $pluralLabel = "Kräfte";

    protected static ?string $recordTitleAttribute = 'slug';

    public static function form(Schema $schema): Schema
    {
        return StationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            CommitmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStations::route('/'),
            'create' => CreateStation::route('/create'),
            'view' => ViewStation::route('/{record}'),
            'edit' => EditStation::route('/{record}/edit'),
        ];
    }
}
