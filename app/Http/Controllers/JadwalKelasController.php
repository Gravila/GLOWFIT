<?php

namespace App\Http\Controllers;

use App\Models\JadwalKelas;
use Illuminate\Http\Request;

class JadwalKelasController extends Controller
{
    // Di JadwalKelasController.php
    public function index(Request $request)
    {
        // Mulai query dengan relasi kelasGym
        $query = \App\Models\JadwalKelas::with('kelasGym');
    
        // Cek apakah ada filter yang dikirim
        if ($request->has('kelas_filter') && $request->kelas_filter != "") {
            $filter = $request->kelas_filter;
            // Kita filter berdasarkan nama_kelas di tabel kelas_gym
            $query->whereHas('kelasGym', function($q) use ($filter) {
                $q->where('nama_kelas', $filter);
            });
        }
    
        $jadwal = $query->get();
        return view('Admin.adminkelas', compact('jadwal'));
    }
    // 2. Menyimpan jadwal baru
    public function store(Request $request) 
    {
        $request->validate([
            'kelas_gym_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
    
        \App\Models\JadwalKelas::create($request->all());
    
        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal baru berhasil ditambahkan!');
    }

    // 3. Mengupdate jadwal
    public function update(Request $request, $id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        $jadwal->update($request->all());
    
        // PENTING: Redirect ke route agar kembali ke daftar kelas
        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal diperbarui!');
    }
    // 4. Menghapus jadwal
    public function destroy($id)
    {
        $jadwal = \App\Models\JadwalKelas::findOrFail($id);
        $jadwal->delete();
    
        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal berhasil dihapus!');
    }

    public function create() 
    {
        // Kita perlu data kelas_gym agar bisa dipilih di dropdown
        $listKelas = \App\Models\KelasGym::all();
        return view('Admin.tambah_kelas', compact('listKelas'));
    }
    public function edit($id)
{
    $jadwal = JadwalKelas::findOrFail($id); // Ambil data spesifik berdasarkan ID
    return view('Admin.editkelas', compact('jadwal')); // Arahkan ke halaman edit
}
}