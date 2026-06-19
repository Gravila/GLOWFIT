<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(Request $request)
{
    // Cari member berdasarkan kode yang diinput
    $member = DB::table('members')->where('kode_member', $request->kode_member)->first();

    // Cek apakah member ditemukan
    if (!$member) {
        return back()->with('error', 'Kode Member tidak ditemukan!');
    }

    // Simpan data ke tabel member_kelas
    DB::table('member_kelas')->insert([
        'member_id' => $member->id,
        'kelas_gym_id' => $request->kelas_id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Kembali ke halaman sebelumnya dengan pesan sukses
    return back()->with('success', 'Booking berhasil dilakukan!');
}

public function verify(Request $request)
{
    // 1. Validasi Kode Member
    $member = DB::table('members')->where('kode_member', $request->kode_member)->first();

    if (!$member) {
        return back()->with('error', 'Kode Member tidak ditemukan!');
    }

    // 2. Simpan kode member ke session agar bisa dipakai nanti
    session(['kode_member' => $request->kode_member]);
    
    // 3. Arahkan ke halaman pilih jadwal berdasarkan ID kelas yang diklik
    return redirect()->route('pilih.jadwal', ['id' => $request->kelas_id]);
}

public function showJadwal($id)
{
    // Ambil data kelas utama
    $kelas = DB::table('kelas_gyms')->where('id', $id)->first();
    
    // Ambil semua jadwal yang tersedia untuk kelas ini
    $jadwal = DB::table('jadwal_kelas')->where('kelas_gym_id', $id)->get();

    return view('pilih_jadwal', compact('kelas', 'jadwal'));
}

public function prosesFinal(Request $request)
{
    $kode = session('kode_member');
    $member = DB::table('members')->where('kode_member', $kode)->first();

    $jadwalData = DB::table('jadwal_kelas')
        ->join('kelas_gyms', 'jadwal_kelas.kelas_gym_id', '=', 'kelas_gyms.id')
        ->where('jadwal_kelas.id', $request->jadwal_id)
        ->select(
            'jadwal_kelas.kelas_gym_id', 
            'kelas_gyms.nama_kelas', 
            'jadwal_kelas.hari', 
            'jadwal_kelas.jam_mulai', 
            'jadwal_kelas.jam_selesai'
        )
        ->first();

    // 1. Pengecekan jika data tidak ditemukan
    if (!$member || !$jadwalData) {
        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
    }

    // 2. Insert ke database
    DB::table('member_kelas')->insert([
        'member_id'     => $member->id,
        'kelas_gym_id'  => $jadwalData->kelas_gym_id,
        'nama_member'   => $member->nama,
        'nama_kelas'    => $jadwalData->nama_kelas,
        'jadwal_detail' => $jadwalData->hari . ', ' . $jadwalData->jam_mulai . ' - ' . $jadwalData->jam_selesai,
        'created_at'    => now(),
        'updated_at'    => now()
    ]);

    // 3. Bersihkan session
    session()->forget('kode_member');

    // 4. Kirim response JSON yang dinamis
    return response()->json([
        'success' => true,
        'message' => "Anda berhasil memilih kelas " . $jadwalData->nama_kelas . " pada hari " . $jadwalData->hari ."."
    ]);
}
public function cekBooking(Request $request)
{
    $riwayat = collect(); 
    $member = null;

    if ($request->filled('kode_member')) {
        $member = DB::table('members')->where('kode_member', $request->kode_member)->first();
        
        if ($member) {
            // Ambil data
            $riwayat = DB::table('member_kelas')
                ->where('member_id', $member->id)
                ->get();

            // Tambahkan status secara manual ke setiap item
            foreach ($riwayat as $item) {
                $detail = $item->jadwal_detail ?? '';
                $jamSelesai = '00:00';

                if (str_contains($detail, ' - ')) {
                    $jamSelesai = trim(explode(' - ', $detail)[1]);
                }

                try {
                    $waktuSelesai = \Carbon\Carbon::createFromTimeString($jamSelesai);
                    $item->status = (now()->greaterThan($waktuSelesai)) ? 'Berakhir' : 'Terkonfirmasi';
                } catch (\Exception $e) {
                    $item->status = 'Terkonfirmasi';
                }
            }
        }
    }

    return view('cek_booking', compact('riwayat', 'member'));
}
}