<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Tambahkan baris ini untuk mengimpor model KelasGym
use App\Models\KelasGym; 

class JadwalKelas extends Model
{
    protected $fillable = ['kelas_gym_id', 'hari', 'jam_mulai', 'jam_selesai'];
    
    // TAMBAHKAN BARIS INI
    public $timestamps = false; 

    public function kelasGym()
    {
        // Mengasumsikan ada tabel 'kelas_gym' dengan kolom 'id'
        return $this->belongsTo(\App\Models\KelasGym::class, 'kelas_gym_id');
    } 
}