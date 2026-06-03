<?php

namespace App\Filament\Resources\CommitmentTypes\Pages;

use App\Filament\Resources\CommitmentTypes\CommitmentTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCommitmentTypes extends ListRecords
{
    protected static string $resource = CommitmentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

