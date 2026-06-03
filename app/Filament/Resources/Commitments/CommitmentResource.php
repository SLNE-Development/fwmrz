<?php

namespace App\Filament\Resources\Commitments;

use App\Filament\Resources\Commitments\Pages\ListCommitments;
use App\Filament\Resources\Commitments\Pages\ViewCommitment;
use App\Filament\Resources\Commitments\Schemas\CommitmentForm;
use App\Filament\Resources\Commitments\Schemas\CommitmentInfolist;
use App\Filament\Resources\Commitments\RelationManagers\StationsRelationManager;
use App\Filament\Resources\Commitments\Tables\CommitmentsTable;
use App\Models\Commitment;
use App\Utils\SidebarNavigation;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CommitmentResource extends Resource
{
    protected static ?string $model = Commitment::class;
    protected static string|UnitEnum|null $navigationGroup = SidebarNavigation::Dashboard;

    protected static ?string $label = "Einsatz";
    protected static ?string $pluralLabel = "Einsätze";

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CommitmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommitmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommitmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            StationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCommitments::route('/'),
            'view'  => ViewCommitment::route('/{record}'),
        ];
    }
}

