<?php

namespace App\Filament\Resources\Commitments\Pages;

use App\Filament\Resources\Commitments\CommitmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommitment extends ViewRecord
{
    protected static string $resource = CommitmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

