<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'karyawan' => Karyawan::all()
        ]);
    }

    public function laporan()
    {
        return view('pages.laporan', [
            'title' => 'Laporan',
            'karyawan' => Karyawan::all()
        ]);
    }
}
