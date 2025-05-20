<?php

namespace App\Filament\Resources\ArcticleNewsResource\Pages;

use App\Filament\Resources\ArcticleNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArcticleNews extends EditRecord
{
    protected static string $resource = ArcticleNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
