<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_member' => 'AF001', 'nama' => 'Budi Santoso', 'email' => 'budi@gym.com', 'layanan' => 'Basic', 'biaya_bulanan' => 100000, 'durasi_kontrak' => 3],
            ['kode_member' => 'TY092', 'nama' => 'Siti Aminah', 'email' => 'siti@gym.com', 'layanan' => 'Premium', 'biaya_bulanan' => 200000, 'durasi_kontrak' => 6],
            ['kode_member' => 'QD063', 'nama' => 'Andi Wijaya', 'email' => 'andi@gym.com', 'layanan' => 'VIP', 'biaya_bulanan' => 350000, 'durasi_kontrak' => 12],
            ['kode_member' => 'CF018', 'nama' => 'Gideon Clarence', 'email' => 'clay@gym.com', 'layanan' => 'VIP', 'biaya_bulanan' => 350000, 'durasi_kontrak' => 3],
            ['kode_member' => 'GH054', 'nama' => 'Callista', 'email' => 'callista@gym.com', 'layanan' => 'Basic', 'biaya_bulanan' => 100000, 'durasi_kontrak' => 12],
        ];
    
        foreach ($data as $item) {
            \App\Models\Member::create($item);
        }
    }
}
