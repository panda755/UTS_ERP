# UTS ERP - PT Neosantara Group

Platform *Enterprise Resource Planning* (ERP) terpadu untuk **PT Neosantara Group**, perusahaan distributor dan retail nasional. Platform ini mengintegrasikan proses bisnis dari pencarian prospek pelanggan, kampanye pemasaran, hingga pengelolaan stok barang di gudang.

Dibuat untuk memenuhi Ujian Tengah Semester (UTS) mata kuliah **Pemrograman Sistem Enterprise**.

| | |
|---|---|
| Jurusan / Program Studi | Teknologi Informasi / Manajemen Informatika |
| Mata Kuliah | P. Sistem Enterprise |
| Dosen | Riyanto, S.Kom., M.Kom |
| Kelas / Semester | 3 / 5 (Ganjil) |
| Tahun Ajaran | 2026/2027 |
| Hari / Tanggal | Rabu, 28 Oktober 2026 |

## Teknologi

- Laravel 13
- FilamentPHP v5
- PHP 8.3 atau lebih baru
- SQLite (database bawaan)

## Anggota Tim dan Pembagian Tugas

Setiap anggota mengerjakan satu modul sistem enterprise pada branch masing-masing, lalu digabungkan ke `main` melalui Pull Request.

| Anggota | Peran | Modul | Fitur yang Dikerjakan | Branch |
|---|---|---|---|---|
| Galih Eka Syaputra | Ketua Tim | CRM (Prospek Pelanggan) | Inisialisasi project dan repository, pemasangan Filament v5, manajemen data prospek pelanggan (Lead) beserta data contoh | `feature/crm` |
| Pauzan | Anggota | Marketing (Kampanye Pemasaran) | Manajemen kampanye pemasaran (Campaign) beserta data contoh | `feature/marketing` |
| Nabila | Anggota | Inventory (Stok Barang di Gudang) | Manajemen produk, pencatatan barang masuk dan keluar, laporan inventory, dan ringkasan stok di dashboard | `feature/inventory` |

### Rincian Fitur per Modul

**1. CRM (Galih Eka Syaputra)**
- Data prospek pelanggan: nama, perusahaan, kontak, sumber prospek, dan status
- Status prospek: Baru, Dihubungi, Negosiasi, Deal, Batal

**2. Marketing (Pauzan)**
- Data kampanye pemasaran: nama, channel, anggaran, periode, dan status
- Channel: Email, Sosial Media, WhatsApp, Iklan Berbayar, Event

**3. Inventory (Nabila)**
- Produk: SKU, nama barang, kategori, harga, stok, batas minimum stok, dan satuan
- Transaksi stok: barang masuk dan barang keluar, dengan penolakan otomatis jika stok tidak mencukupi
- Laporan Inventory: ringkasan stok, total barang masuk dan keluar, serta riwayat transaksi dengan filter periode
- Widget dashboard: total produk, total transaksi, dan jumlah produk dengan stok menipis

## Screenshot Hasil Akhir

### Modul Marketing

![Modul Marketing](https://github.com/user-attachments/assets/8e0e5dcf-3f96-4a84-a993-9910d7607857)

**Fitur: Manajemen Kampanye Pemasaran (Campaign)**, dikerjakan oleh Pauzan.

### Modul Inventory

![Modul Inventory](https://github.com/user-attachments/assets/2778c6a9-4355-45a2-8b56-e26a82c25c99)

**Fitur: Manajemen Produk, Transaksi Stok, dan Laporan Inventory**, dikerjakan oleh Nabila.

### Seluruh Fitur

![Seluruh Fitur](https://github.com/user-attachments/assets/03dfd4c4-2fe6-4d43-9849-8e7a56d23b6e)

**Fitur: Seluruh Modul ERP (CRM, Marketing, dan Inventory) dalam satu panel admin.**

## Instalasi

Persyaratan: PHP 8.3 atau lebih baru dan Composer.

```bash
git clone https://github.com/panda755/UTS_ERP.git
cd UTS_ERP
composer install
copy .env.example .env
php artisan key:generate
type nul > database\database.sqlite
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=LeadSeeder
php artisan db:seed --class=CampaignSeeder
php artisan serve
```

Pengguna Linux atau macOS mengganti `copy` dengan `cp` dan `type nul >` dengan `touch`.

Buka `http://127.0.0.1:8000/admin` lalu login dengan akun dari `UserSeeder`:

- Email: `admin@example.com`
- Password: `password123`

Data produk dan transaksi stok pada modul Inventory diisi langsung melalui panel admin.

## Alur Kerja Tim

1. Ketua menginisialisasi project Laravel dan Filament v5, membuat repository publik, lalu mengundang anggota sebagai kolaborator.
2. Setiap anggota membuat branch fitur masing-masing: `feature/crm`, `feature/marketing`, dan `feature/inventory`.
3. Setiap branch digabungkan ke `main` melalui Pull Request, sehingga riwayat commit tiap anggota tetap tercatat.
