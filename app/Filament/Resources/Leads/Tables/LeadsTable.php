<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Prospek')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company_name')
                    ->label('Perusahaan')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label('Telepon')
                    ->toggleable(),
                TextColumn::make('source')
                    ->label('Sumber')
                    ->badge(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'deal' => 'success',
                        'negosiasi' => 'warning',
                        'dihubungi' => 'info',
                        'batal' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('last_contacted_at')
                    ->label('Terakhir Dihubungi')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'baru' => 'Baru',
                        'dihubungi' => 'Dihubungi',
                        'negosiasi' => 'Negosiasi',
                        'deal' => 'Deal',
                        'batal' => 'Batal',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}