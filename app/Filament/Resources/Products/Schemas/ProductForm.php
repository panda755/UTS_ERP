<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('sku')
                ->label('Kode SKU')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            TextInput::make('name')
                ->label('Nama Barang')
                ->required()
                ->maxLength(255),

            TextInput::make('category')
                ->label('Kategori')
                ->placeholder('Contoh: Elektronik'),

            TextInput::make('price')
                ->label('Harga Barang')
                ->numeric()
                ->prefix('Rp')
                ->required()
                ->minValue(0),

            TextInput::make('stock')
                ->label('Stok Saat Ini')
                ->numeric()
                ->integer()
                ->required()
                ->minValue(0)
                ->default(0),

            TextInput::make('minimum_stock')
                ->label('Batas Minimum Stok')
                ->numeric()
                ->integer()
                ->required()
                ->minValue(0)
                ->default(5),

            TextInput::make('unit')
                ->label('Satuan')
                ->required()
                ->default('pcs'),

            Textarea::make('description')
                ->label('Deskripsi Barang')
                ->columnSpanFull(),
        ]);
    }
}