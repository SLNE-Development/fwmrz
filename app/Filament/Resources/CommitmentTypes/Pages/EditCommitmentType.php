<?php

namespace App\Filament\Resources\CommitmentTypes\Pages;

use App\Filament\Resources\CommitmentTypes\CommitmentTypeResource;
use App\Utils\SlugHelper;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCommitmentType extends EditRecord
{
    protected static string $resource = CommitmentTypeResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = SlugHelper::unique($data['name'], 'commitment_types', $this->record->id);
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

