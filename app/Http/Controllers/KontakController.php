<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|max:2000',
        ]);

        Kontak::create($validated);

        return redirect()
            ->route('kontak.index')
            ->with('sukses', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
