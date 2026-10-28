<?php

namespace App\Filament\Resources\StockMovements\Schemas;

use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StockMovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Produk')
                    ->options(
                        Product::query()
                            ->orderBy('name')
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),

                Select::make('type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'in' => 'Barang Masuk',
                        'out' => 'Barang Keluar',
                    ])
                    ->required(),

                TextInput::make('quantity')
                    ->label('Jumlah Barang')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->required(),

                Textarea::make('notes')
                    ->label('Catatan')
                    ->rows(3)
                    ->maxLength(1000),
            ]);
    }
}
