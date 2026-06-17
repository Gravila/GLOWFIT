<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'email', 'no_hp', 'layanan', 'biaya_bulanan', 
        'durasi_kontrak', 'kode_member', 'status_aktif', 'user_id'
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'biaya_bulanan' => 'double',
    ];

    // Local Scope untuk mencari member yang masih aktif
    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    public function kelas()
    {
        // Member memiliki banyak Kelas melalui tabel pivot member_kelas
        return $this->belongsToMany(KelasGym::class, 'member_kelas');
    }
}
