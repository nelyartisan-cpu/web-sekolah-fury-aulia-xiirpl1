<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\View\View;

class GuruController extends Controller
{
    /**
     * Menampilkan semua guru
     */
    public function index(): View
    {
        $guru = Guru::latest()->paginate(12);

        return view(
            'guru.index',
            compact('guru')
        );
    }

    /**
     * Detail guru
     */
    public function show(Guru $guru): View
    {
        return view(
            'guru.show',
            compact('guru')
        );
    }
}