<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GymController extends Controller
{
    public function indexKelas() {
        // Mengambil semua kelas dan menghitung jumlah booking dari tabel member_kelas
// Di GymController.php
$kelas = DB::table('kelas_gyms')
    ->leftJoin('member_kelas', 'kelas_gyms.id', '=', 'member_kelas.kelas_gym_id')
    ->select('kelas_gyms.*', DB::raw('count(member_kelas.id) as total_booking'))
    ->groupBy('kelas_gyms.id', 'kelas_gyms.nama_kelas', 'kelas_gyms.image', 'kelas_gyms.kapasitas')
    ->get();
        return view('kelasglowfit', compact('kelas'));
    }
}