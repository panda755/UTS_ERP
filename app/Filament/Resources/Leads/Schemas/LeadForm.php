<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Prospek')
                    ->required()
                    ->maxLength(255),
                TextInput::make('company_name')
                    ->label('Perusahaan')
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
                TextInput::make('phone')
                    ->label('No. Telepon')
                    ->tel(),
                Select::make('source')
                    ->label('Sumber')
                    ->options([
                        'website' => 'Website',
                        'referral' => 'Referral',
                        'kampanye' => 'Kampanye',
                        'event' => 'Event',
                        'lainnya' => 'Lainnya',
                    ])
                    ->default('lainnya')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'baru' => 'Baru',
                        'dihubungi' => 'Dihubungi',
                        'negosiasi' => 'Negosiasi',
                        'deal' => 'Deal',
                        'batal' => 'Batal',
                    ])
                    ->default('baru')
                    ->required(),
                DatePicker::make('last_contacted_at')
                    ->label('Terakhir Dihubungi'),
                Textarea::make('notes')
                    ->label('Catatan')
                    ->columnSpanFull(),
            ]);
    }
}