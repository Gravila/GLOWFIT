<?php

namespace App\Http\Controllers;

use App\Models\Member; // Import Model Member
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        // 1. Ambil data tracking dari session saat ini
        $kunjungan = session('total_kunjungan', 0) + 1;
        $kunjunganPertama = session('kunjungan_pertama', Carbon::now()->toDateTimeString());
        $kunjunganTerakhir = Carbon::now()->toDateTimeString();

        // 2. Masukkan kembali data terbaru ke dalam session
        session(['total_kunjungan' => $kunjungan]);
        session(['kunjungan_pertama' => $kunjunganPertama]);
        session(['kunjungan_terakhir' => $kunjunganTerakhir]);
        
        $userId = Auth::id(); 
        
        // Tambahkan Member::query() agar VS Code lebih mudah mengenalinya
        $members = Member::query()->where('user_id', $userId)->paginate(10);
        
        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_member' => 'required|unique:members,kode_member',
            'nama'        => 'required|min:3',
            'email'       => 'required|email|unique:members,email',
            'layanan'     => 'required|in:Basic,Premium,VIP',
            'biaya_bulanan' => 'required|numeric',
            'durasi_kontrak' => 'required|integer',
        ]);
        $validated['user_id'] = Auth::id(); 

        Member::create($validated);
        return redirect()->route('member.index')->with('success', 'Member baru berhasil didaftarkan!');
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }


    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'nama'        => 'required|min:3',
            'email'       => 'required|email|unique:members,email,' . $member->id,
            'layanan'     => 'required|in:Basic,Premium,VIP',
            'biaya_bulanan' => 'required|numeric',
            'durasi_kontrak' => 'required|integer',
            'status_aktif'   => 'required|boolean',
        ]);

        $member->update($validated);

        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
 
        return redirect()->route('member.index')->with('success', 'Member telah berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
    
        $members = Member::query()
            ->where('user_id', Auth::id())
            ->where(function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('kode_member', 'LIKE', "%{$query}%");
            })
            ->get();
    
        // Kembalikan dalam bentuk JSON untuk AJAX
        return response()->json($members);
    }

    // Bagian ini adalah Implementasi Poin 3.g
    public function saveSettings(Request $request)
    {
        $theme = $request->input('theme', 'light');
        $fontSize = $request->input('font_size', 'base');

        Cookie::queue('theme', $theme, 43200);
        Cookie::queue('font_size', $fontSize, 43200);

        // Mengembalikan JSON konfirmasi (Sesuai perintah 3.g)
        return response()->json([
            'status' => 'success',
            'message' => 'Preferensi berhasil disimpan!',
            'theme' => $theme,
            'font_size' => $fontSize
        ]);
    }
}