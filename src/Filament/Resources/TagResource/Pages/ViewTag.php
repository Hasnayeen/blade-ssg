<?php

namespace Hasnayeen\BladeSsg\Filament\Resources\TagResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Hasnayeen\BladeSsg\Filament\Resources\TagResource;

class ViewTag extends ViewRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
