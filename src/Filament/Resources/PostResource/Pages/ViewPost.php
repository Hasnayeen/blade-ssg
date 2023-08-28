<?php

namespace Hasnayeen\BladeSsg\Filament\Resources\PostResource\Pages;

use Hasnayeen\BladeSsg\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
