<?php

namespace App\Filament\Resources\CommitmentTypes\Pages;

use App\Filament\Resources\CommitmentTypes\CommitmentTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommitmentType extends ViewRecord
{
    protected static string $resource = CommitmentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

