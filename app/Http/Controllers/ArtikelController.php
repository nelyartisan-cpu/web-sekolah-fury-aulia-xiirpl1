<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    /**
     * Menampilkan semua artikel
     */
    public function index(): View
    {
        $artikels = Artikel::latest()->paginate(9);

        return view('artikel.index', compact('artikels'));
    }


    /**
     * Menampilkan detail artikel
     */
    public function show(Artikel $artikel): View
    {
        return view('artikel.show', compact('artikel'));
    }
}