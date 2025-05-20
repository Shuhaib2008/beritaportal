<?php

namespace App\Filament\Resources\ArcticleNewsResource\Pages;

use App\Filament\Resources\ArcticleNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArcticleNews extends ListRecords
{
    protected static string $resource = ArcticleNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
