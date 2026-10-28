
<x-filament-panels::page>
    @php
        $stats = $this->getReportStats();
        $movements = $this->getMovements();
    @endphp

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <x-filament::section>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Total Produk
            </div>
            <div class="mt-2 text-3xl font-bold">
                {{ number_format($stats['total_products']) }}
            </div>
        </x-filament::section>

        <x-filament::section>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Total Stok Saat Ini
            </div>
            <div class="mt-2 text-3xl font-bold">
                {{ number_format($stats['total_stock']) }}
            </div>
        </x-filament::section>

        <x-filament::section>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Produk Stok Menipis
            </div>
            <div class="mt-2 text-3xl font-bold text-danger-600">
                {{ number_format($stats['low_stock']) }}
            </div>
        </x-filament::section>

        <x-filament::section>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Total Barang Masuk
            </div>
            <div class="mt-2 text-2xl font-bold text-success-600">
                {{ number_format($stats['total_in']) }}
            </div>
        </x-filament::section>

        <x-filament::section>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Total Barang Keluar
            </div>
            <div class="mt-2 text-2xl font-bold text-danger-600">
                {{ number_format($stats['total_out']) }}
            </div>
        </x-filament::section>
    </div>

    <x-filament::section>
        <x-slot name="heading">
            Filter Periode Laporan
        </x-slot>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label for="startDate"
                    class="mb-2 block text-sm font-medium">
                    Dari Tanggal
                </label>

                <input
                    id="startDate"
                    type="date"
                    wire:model.live="startDate"
                    class="w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900"
                >
            </div>

            <div>
                <label for="endDate"
                    class="mb-2 block text-sm font-medium">
                    Sampai Tanggal
                </label>

                <input
                    id="endDate"
                    type="date"
                    wire:model.live="endDate"
                    class="w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900"
                >
            </div>

            <div class="flex items-end">
                <x-filament::button
                    color="gray"
                    icon="heroicon-o-arrow-path"
                    wire:click="resetFilters"
                >
                    Reset Filter
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>

    <x-filament::section>
        <x-slot name="heading">
            Riwayat Transaksi Inventory
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="px-3 py-3">Tanggal</th>
                        <th class="px-3 py-3">Nama Produk</th>
                        <th class="px-3 py-3">Jenis Transaksi</th>
                        <th class="px-3 py-3">Jumlah</th>
                        <th class="px-3 py-3">Catatan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($movements as $movement)
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="px-3 py-3 whitespace-nowrap">
                                {{ $movement->created_at?->format('d-m-Y H:i') }}
                            </td>

                            <td class="px-3 py-3">
                                {{ $movement->product?->name ?? 'Produk tidak ditemukan' }}
                            </td>

                            <td class="px-3 py-3">
                                @if ($movement->type === 'in')
                                    <span class="font-medium text-success-600">
                                        Barang Masuk
                                    </span>
                                @else
                                    <span class="font-medium text-danger-600">
                                        Barang Keluar
                                    </span>
                                @endif
                            </td>

                            <td class="px-3 py-3">
                                {{ number_format($movement->quantity) }}
                            </td>

                            <td class="px-3 py-3">
                                {{ $movement->notes ?: '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="px-3 py-8 text-center text-gray-500">
                                Tidak ada transaksi pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-sm text-gray-500">
            Total {{ $movements->count() }} transaksi ditemukan.
        </div>
    </x-filament::section>
</x-filament-panels::page>
