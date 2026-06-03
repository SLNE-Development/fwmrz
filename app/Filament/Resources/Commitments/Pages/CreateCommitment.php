<?php

namespace App\Filament\Resources\Commitments\Pages;

use App\Filament\Resources\Commitments\CommitmentResource;
use App\Utils\SlugHelper;
use Filament\Resources\Pages\CreateRecord;

class CreateCommitment extends CreateRecord
{
    protected static string $resource = CommitmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = SlugHelper::unique($data['title'], 'commitments');
        return $data;
    }
}
