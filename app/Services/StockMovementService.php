<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use Illuminate\Validation\ValidationException;

class StockMovementService
{
    public function record(
        int $productId,
        string $type,
        int $quantity,
        ?string $notes = null
    ): StockMovement {
        if (! in_array($type, ['in', 'out'], true)) {
            throw ValidationException::withMessages([
                'type' => 'Jenis transaksi tidak valid.',
            ]);
        }

        if ($quantity < 1) {
            throw ValidationException::withMessages([
                'quantity' => 'Jumlah barang minimal 1.',
            ]);
        }

        return DB::transaction(function () use (
            $productId,
            $type,
            $quantity,
            $notes
        ) {
            $product = Product::query()->findOrFail($productId);

            if ($type === 'out') {
                $updated = Product::query()
                    ->whereKey($productId)
                    ->where('stock', '>=', $quantity)
                    ->decrement('stock', $quantity);

                if ($updated !== 1) {
                    throw ValidationException::withMessages([
                        'quantity' => 'Stok tidak cukup untuk transaksi ini.',
                    ]);
                }
            } else {
                $product->increment('stock', $quantity);
            }

            return StockMovement::create([
                'product_id' => $productId,
                'type' => $type,
                'quantity' => $quantity,
                'notes' => $notes,
                'user_id' => Auth::id(),
            ]);
        });
    }
}
