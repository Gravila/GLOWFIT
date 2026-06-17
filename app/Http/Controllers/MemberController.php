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

    // FUNGSI 2: Hanya untuk memproses data dari form
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'layanan' => 'required',
        ]);

        Member::create($validated);

        return redirect()->back()->with('success', 'Member berhasil ditambahkan!');
    }
}