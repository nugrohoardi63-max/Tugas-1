<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Menampilkan halaman Register (form pendaftaran).
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Menerima data dari form Register dan menampilkan halaman Welcome.
     */
    public function welcome(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|max:100',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
        ]);

        // Kirim data ke view welcome
        return view('welcome', [
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? '-',
            'address'    => $validated['address'] ?? '-',
        ]);
    }
}
