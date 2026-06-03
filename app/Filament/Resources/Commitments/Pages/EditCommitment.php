<?php

namespace App\Filament\Resources\Commitments\Pages;

use App\Filament\Resources\Commitments\CommitmentResource;
use App\Utils\SlugHelper;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCommitment extends EditRecord
{
    protected static string $resource = CommitmentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = SlugHelper::unique($data['title'], 'commitments', $this->record->id);
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

