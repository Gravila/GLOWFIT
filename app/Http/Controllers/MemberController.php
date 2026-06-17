<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // FUNGSI 1: Hanya untuk menampilkan tampilan
    public function index() 
    {
        return view('member.index'); // Pastikan file kamu bernama member.blade.php
    }

    public function store(Request $request) 
    {
        // 1. Validasi
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:members',
            'no_hp' => 'required',
            'layanan' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
        ]);
    
        // 2. Data Lengkap (Pastikan semua kolom di database terisi)
        $dataToSave = [
            'nama'          => $validated['nama'],
            'email'         => $validated['email'],
            'no_hp'            => $validated['no_hp'],
            'layanan'       => $validated['layanan'],
            'biaya_bulanan' => $request->harga, // Ambil dari input form
            'durasi_kontrak'=> $request->durasi . ' Bulan',
            'kode_member'   => 'GF-' . date('Y') . '-' . strtoupper(bin2hex(random_bytes(3))),
            'status_aktif'  => 'Aktif',
            'user_id'       => 1, // ID default
        ];
    
        // 3. Simpan
        try {
            $member = Member::create($dataToSave);
            // Pastikan baris ini yang digunakan di dalam fungsi store
            return back()->with([
                'success' => $member->kode_member,
                'nama_member' => $member->nama
            ]);
        } catch (\Exception $e) {
            // Jika masih error, kita tampilkan pesan error-nya langsung
            return "Error Database: " . $e->getMessage();
        }
    }
}