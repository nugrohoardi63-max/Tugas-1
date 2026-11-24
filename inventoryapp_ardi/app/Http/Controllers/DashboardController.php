<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman Home.
     */
    public function index()
    {
        return view('home');
    }
}
