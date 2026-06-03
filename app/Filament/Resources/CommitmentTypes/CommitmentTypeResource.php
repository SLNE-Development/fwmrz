<?php

namespace App\Filament\Resources\CommitmentTypes;

use App\Filament\Resources\CommitmentTypes\Pages\CreateCommitmentType;
use App\Filament\Resources\CommitmentTypes\Pages\EditCommitmentType;
use App\Filament\Resources\CommitmentTypes\Pages\ListCommitmentTypes;
use App\Filament\Resources\CommitmentTypes\Pages\ViewCommitmentType;
use App\Filament\Resources\CommitmentTypes\Schemas\CommitmentTypeForm;
use App\Filament\Resources\CommitmentTypes\Schemas\CommitmentTypeInfolist;
use App\Filament\Resources\CommitmentTypes\RelationManagers\CommitmentsRelationManager;
use App\Filament\Resources\CommitmentTypes\Tables\CommitmentTypesTable;
use App\Models\CommitmentType;
use App\Utils\SidebarNavigation;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CommitmentTypeResource extends Resource
{
    protected static ?string $model = CommitmentType::class;
    protected static string|UnitEnum|null $navigationGroup = SidebarNavigation::Dashboard;

    protected static ?string $label = "Einsatzart";
    protected static ?string $pluralLabel = "Einsatzarten";

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CommitmentTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommitmentTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommitmentTypesTable::configure($table);
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
            'index'  => ListCommitmentTypes::route('/'),
            'create' => CreateCommitmentType::route('/create'),
            'view'   => ViewCommitmentType::route('/{record}'),
            'edit'   => EditCommitmentType::route('/{record}/edit'),
        ];
    }
}

