<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasGym extends Model
{
    public function members()
    {
        // Kelas memiliki banyak Member melalui tabel pivot member_kelas
        return $this->belongsToMany(Member::class, 'member_kelas');
    }
}
