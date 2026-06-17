<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Pastikan nama tabel di database sesuai, misal 'bookings'
    protected $table = 'bookings'; 
    
    // Izinkan kolom yang sering diakses
    protected $fillable = ['user_id', 'kelas_gym_id', 'status', 'harga'];
}