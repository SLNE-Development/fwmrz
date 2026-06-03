<?php

namespace App\Media;

use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\Conversions\ConversionCollection;
use Spatie\MediaLibrary\Conversions\FileManipulator;
use Spatie\MediaLibrary\Conversions\Jobs\PerformConversionsJob as BaseJob;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Throwable;

class PerformConversionsJob extends BaseJob
{
    public function __construct(
        protected ConversionCollection $conversions,
        protected Media $media,
        protected bool $onlyMissing = false,
    ) {}

    public function handle(FileManipulator $fileManipulator): bool
    {
        try {
            $fileManipulator->performConversions(
                $this->conversions,
                $this->media,
                $this->onlyMissing
            );
        } catch (Throwable $e) {
            Log::warning('Media conversion failed for media ID ' . $this->media->id . ': ' . $e->getMessage());
        }

        return true;
    }
}

