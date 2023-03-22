<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public function laporan()
    {
        return view('pages.laporan', [
            'title' => 'Laporan'
        ]);
    }
}
