<?php

namespace App\Filament\Pages;

use App\Models\Product;
use App\Models\StockMovement;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class InventoryReport extends Page
{
    protected string $view = 'filament.pages.inventory-report';

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedChartBar;

    protected static ?string $navigationLabel = 'Laporan Inventory';

    protected static ?string $title = 'Laporan Inventory';

    public ?string $startDate = null;

    public ?string $endDate = null;

    public function mount(): void
    {
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->toDateString();
    }

    public function getReportStats(): array
    {
        return [
            'total_products' => Product::count(),

            'total_stock' => Product::sum('stock'),

            'low_stock' => Product::query()
                ->whereColumn('stock', '<=', 'minimum_stock')
                ->count(),

            'total_in' => $this->getMovementsQuery()
                ->clone()
                ->where('type', 'in')
                ->sum('quantity'),

            'total_out' => $this->getMovementsQuery()
                ->clone()
                ->where('type', 'out')
                ->sum('quantity'),
        ];
    }

    public function getMovementsQuery(): Builder
    {
        return StockMovement::query()
            ->with('product')
            ->when(
                $this->startDate,
                fn (Builder $query) => $query->whereDate(
                    'created_at',
                    '>=',
                    $this->startDate
                )
            )
            ->when(
                $this->endDate,
                fn (Builder $query) => $query->whereDate(
                    'created_at',
                    '<=',
                    $this->endDate
                )
            );
    }

    public function getMovements(): Collection
    {
        return $this->getMovementsQuery()
            ->latest()
            ->get();
    }

    public function resetFilters(): void
    {
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->toDateString();
    }
}
