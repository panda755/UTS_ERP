<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = [
            [
                'name' => 'Promo Akhir Tahun 2026',
                'channel' => 'sosial_media',
                'budget' => 15000000,
                'start_date' => '2026-12-01',
                'end_date' => '2026-12-31',
                'status' => 'draft',
                'description' => 'Diskon akhir tahun untuk seluruh produk distribusi.',
            ],
            [
                'name' => 'Newsletter Produk Baru',
                'channel' => 'email',
                'budget' => 2500000,
                'start_date' => '2026-10-15',
                'end_date' => '2026-11-15',
                'status' => 'aktif',
                'description' => 'Pengiriman email katalog produk baru ke daftar prospek.',
            ],
            [
                'name' => 'Broadcast WhatsApp Reseller',
                'channel' => 'whatsapp',
                'budget' => 1500000,
                'start_date' => '2026-10-20',
                'end_date' => '2026-11-20',
                'status' => 'aktif',
                'description' => 'Penawaran harga khusus untuk calon reseller.',
            ],
            [
                'name' => 'Iklan Google Ads Q4',
                'channel' => 'iklan',
                'budget' => 20000000,
                'start_date' => '2026-10-01',
                'end_date' => '2026-12-31',
                'status' => 'aktif',
                'description' => 'Iklan pencarian untuk kata kunci distributor dan grosir.',
            ],
            [
                'name' => 'Pameran Dagang Pekanbaru',
                'channel' => 'event',
                'budget' => 30000000,
                'start_date' => '2026-09-05',
                'end_date' => '2026-09-08',
                'status' => 'selesai',
                'description' => 'Stan pameran untuk menjaring prospek pelanggan baru.',
            ],
        ];

        foreach ($campaigns as $campaign) {
            Campaign::updateOrCreate(
                ['name' => $campaign['name']],
                $campaign,
            );
        }
    }
}