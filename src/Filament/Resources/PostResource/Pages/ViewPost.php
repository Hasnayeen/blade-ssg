<?php

namespace Hasnayeen\BladeSsg\Filament\Resources\PostResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Hasnayeen\BladeSsg\Filament\Resources\PostResource;

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
