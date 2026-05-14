<?php

namespace App\Http\Controllers;

use App\Models\Member; // Import Model Member
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
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
}