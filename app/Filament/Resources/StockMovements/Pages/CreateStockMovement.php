<?php

namespace App\Filament\Resources\StockMovements\Pages;

use App\Filament\Resources\StockMovements\StockMovementResource;
use App\Services\StockMovementService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStockMovement extends CreateRecord
{
    protected static string $resource = StockMovementResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(StockMovementService::class)->record(
            productId: (int) $data['product_id'],
            type: $data['type'],
            quantity: (int) $data['quantity'],
            notes: $data['notes'] ?? null,
        );
    }
}
