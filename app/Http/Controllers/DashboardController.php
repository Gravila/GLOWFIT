<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KelasGym;
use App\Models\Member; // Pastikan model Member ada
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
{
    // Tanpa Auth::user(), jadi ini aman buat siapa saja
    return view('dashboard'); 
}
    public function admin() 
    {
        $data = [
            'totalMember'     => \App\Models\Member::count(),
            'kelasAktif'      => \App\Models\KelasGym::count(),
            'bookingPending'  => \App\Models\Member::where('status_aktif', false)->count(),
            'totalPendapatan' => \App\Models\Member::sum('biaya_bulanan'),
            'memberBaru'      => \App\Models\Member::whereMonth('created_at', date('m'))->count(), 
        ];
    
        return view('Admin.dashboardadmin', compact('data')); 
    }
}