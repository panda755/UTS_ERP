<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $leads = [
            [
                'name' => 'Budi Santoso',
                'company_name' => 'CV Maju Jaya',
                'email' => 'budi@majujaya.co.id',
                'phone' => '081234567801',
                'source' => 'website',
                'status' => 'baru',
                'last_contacted_at' => null,
                'notes' => 'Mengisi form permintaan penawaran di website.',
            ],
            [
                'name' => 'Siti Rahmawati',
                'company_name' => 'Toko Sumber Rejeki',
                'email' => 'siti@sumberrejeki.id',
                'phone' => '081234567802',
                'source' => 'referral',
                'status' => 'dihubungi',
                'last_contacted_at' => '2026-10-20',
                'notes' => 'Direferensikan oleh pelanggan lama, minta katalog produk.',
            ],
            [
                'name' => 'Andi Prasetyo',
                'company_name' => 'PT Karya Mandiri',
                'email' => 'andi@karyamandiri.co.id',
                'phone' => '081234567803',
                'source' => 'event',
                'status' => 'negosiasi',
                'last_contacted_at' => '2026-10-24',
                'notes' => 'Bertemu di pameran dagang, sedang negosiasi harga grosir.',
            ],
            [
                'name' => 'Dewi Lestari',
                'company_name' => 'Minimarket Berkah',
                'email' => 'dewi@minimarketberkah.id',
                'phone' => '081234567804',
                'source' => 'kampanye',
                'status' => 'deal',
                'last_contacted_at' => '2026-10-26',
                'notes' => 'Sepakat kontrak pasokan bulanan.',
            ],
            [
                'name' => 'Rudi Hartono',
                'company_name' => 'UD Sinar Terang',
                'email' => 'rudi@sinarterang.id',
                'phone' => '081234567805',
                'source' => 'lainnya',
                'status' => 'batal',
                'last_contacted_at' => '2026-10-15',
                'notes' => 'Membatalkan karena anggaran belum tersedia.',
            ],
            [
                'name' => 'Maya Anggraini',
                'company_name' => 'Grosir Nusantara',
                'email' => 'maya@grosirnusantara.co.id',
                'phone' => '081234567806',
                'source' => 'website',
                'status' => 'dihubungi',
                'last_contacted_at' => '2026-10-27',
                'notes' => 'Tertarik menjadi reseller di wilayah Riau.',
            ],
        ];

        foreach ($leads as $lead) {
            Lead::updateOrCreate(
                ['email' => $lead['email']],
                $lead,
            );
        }
    }
}