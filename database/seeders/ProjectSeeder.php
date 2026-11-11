<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $Tiwi = User::where('email', 'tiwi@garuda.com')->first();
        $Siti = User::where('email', 'siti@garuda.com')->first();
        $Rosa = User::where('email', 'rosa@garuda.com')->first();

        $Tiwi->projects()->create([
            'title' => 'Website Company Profile UMKM',
            'description' => 'Butuh website company profile responsif dengan halaman produk dan kontak.',
            'category' => 'Web',
            'budget' => 3000000,
            'bid_deadline' => now()->addDays(14),
        ]);

        $Siti->projects()->create([
            'title' => 'Aplikasi Kasir Android',
            'description' => 'Aplikasi kasir sederhana untuk toko kelontong, ada laporan harian.',
            'category' => 'Mobile',
            'budget' => 5000000,
            'bid_deadline' => now()->addDays(10),
        ]);

        $Rosa->projects()->create([
            'title' => 'Dashboard Analitik Penjualan',
            'description' => 'Dashboard visualisasi data penjualan bulanan dari file CSV.',
            'category' => 'Data',
            'budget' => 2500000,
            'bid_deadline' => now()->addDays(7),
        ]);
    }
}
