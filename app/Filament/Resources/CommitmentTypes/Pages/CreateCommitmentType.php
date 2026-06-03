<?php

namespace App\Filament\Resources\CommitmentTypes\Pages;

use App\Filament\Resources\CommitmentTypes\CommitmentTypeResource;
use App\Utils\SlugHelper;
use Filament\Resources\Pages\CreateRecord;

class CreateCommitmentType extends CreateRecord
{
    protected static string $resource = CommitmentTypeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = SlugHelper::unique($data['name'], 'commitment_types');
        return $data;
    }
}
