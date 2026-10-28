<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\StockMovement;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InventoryOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::count();

        $totalTransactions = StockMovement::count();

        $lowStockProducts = Product::query()
            ->whereColumn('stock', '<=', 'minimum_stock')
            ->count();

        return [
            Stat::make('Total Produk', $totalProducts)
                ->description('Jumlah produk terdaftar')
                ->icon('heroicon-o-cube'),

            Stat::make('Total Transaksi', $totalTransactions)
                ->description('Barang masuk dan barang keluar')
                ->icon('heroicon-o-arrows-right-left'),

            Stat::make('Stok Menipis', $lowStockProducts)
                ->description('Produk pada atau di bawah stok minimum')
                ->icon('heroicon-o-exclamation-triangle')
                ->color($lowStockProducts > 0 ? 'danger' : 'success'),
        ];
    }
}
