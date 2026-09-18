<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\View\View;

class EkstrakurikulerController extends Controller
{
    /**
     * Menampilkan semua ekstrakurikuler.
     */
    public function index(): View
    {
        $ekstrakurikulers = Ekstrakurikuler::with('guru')
            ->latest()
            ->paginate(12);

        return view(
            'ekstrakurikuler.index',
            compact('ekstrakurikulers')
        );
    }

    /**
     * Menampilkan detail ekstrakurikuler.
     */
    public function show(Ekstrakurikuler $ekstrakurikuler): View
    {
        $ekstrakurikuler->load('guru');

        return view(
            'ekstrakurikuler.show',
            compact('ekstrakurikuler')
        );
    }
}