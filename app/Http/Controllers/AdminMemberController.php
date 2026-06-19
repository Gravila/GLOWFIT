<?php

namespace App\Http\Controllers; // Tetap di sini

use App\Models\Member;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Member::query();
    
        // Filter Layanan
        if ($request->filled('layanan')) {
            $query->where('layanan', $request->layanan);
        }
    
        // Filter Durasi
        if ($request->filled('durasi')) {
            $query->where('durasi_kontrak', 'LIKE', '%' . $request->durasi . '%');
        }
    
        $members = $query->get();
        return view('Admin.index', compact('members'));
    }
    public function updateStatus(Request $request, $id)
    {
        $member = \App\Models\Member::findOrFail($id);
        $member->status_aktif = $request->status_aktif;
        $member->save();

        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }
}