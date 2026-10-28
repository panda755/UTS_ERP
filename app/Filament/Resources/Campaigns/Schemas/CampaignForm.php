<?php

namespace App\Filament\Resources\Campaigns\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Kampanye')
                    ->required()
                    ->maxLength(255),
                Select::make('channel')
                    ->label('Channel')
                    ->options([
                        'email' => 'Email',
                        'sosial_media' => 'Sosial Media',
                        'whatsapp' => 'WhatsApp',
                        'iklan' => 'Iklan Berbayar',
                        'event' => 'Event',
                    ])
                    ->required(),
                TextInput::make('budget')
                    ->label('Anggaran')
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0)
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('Tanggal Selesai')
                    ->afterOrEqual('start_date'),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                    ])
                    ->default('draft')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}