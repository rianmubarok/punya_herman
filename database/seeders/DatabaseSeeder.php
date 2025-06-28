<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user demo jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'userdemo@example.com'],
            [
                'name' => 'User Demo',
                'password' => bcrypt('password'),
                'role' => 'user'
            ]
        );

        // Buat admin demo jika belum ada
        $admin = User::firstOrCreate(
            ['email' => 'admindemo@example.com'],
            [
                'name' => 'Admin Demo',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]
        );

        // Buat portofolio contoh untuk user
        Portfolio::firstOrCreate([
            'user_id' => $user->id,
            'title' => 'Website Company Profile',
            'description' => 'Contoh portofolio website company profile dengan Laravel.',
            'skills' => 'Laravel, Tailwind, MySQL',
            'project_link' => 'https://contoh.com'
        ]);

        // Buat portofolio contoh untuk admin
        Portfolio::firstOrCreate([
            'user_id' => $admin->id,
            'title' => 'Aplikasi Toko Online',
            'description' => 'Contoh portofolio aplikasi toko online dengan fitur lengkap.',
            'skills' => 'PHP, Laravel, Vue.js',
            'project_link' => 'https://tokoonline.com'
        ]);

        // Tambah user baru
        $anotherUser = User::firstOrCreate(
            ['email' => 'anotheruser@example.com'],
            [
                'name' => 'User Lain',
                'password' => bcrypt('password'),
                'role' => 'user'
            ]
        );

        // Tambah portofolio baru untuk user lain
        Portfolio::firstOrCreate([
            'user_id' => $anotherUser->id,
            'title' => 'Aplikasi Kasir Sederhana',
            'description' => 'Portofolio aplikasi kasir berbasis web dengan fitur transaksi dan laporan.',
            'skills' => 'Laravel, Bootstrap, SQLite',
            'project_link' => 'https://kasir.com'
        ]);

        // Tambah portofolio baru untuk admin
        Portfolio::firstOrCreate([
            'user_id' => $admin->id,
            'title' => 'Sistem Informasi Perpustakaan',
            'description' => 'Portofolio sistem informasi perpustakaan digital dengan fitur peminjaman dan pengembalian buku.',
            'skills' => 'PHP, Laravel, MySQL',
            'project_link' => 'https://perpustakaan.com'
        ]);
    }
}