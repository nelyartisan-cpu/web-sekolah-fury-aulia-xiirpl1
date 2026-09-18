<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGuruController extends Controller
{
    /**
     * Menampilkan semua data guru
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);

        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        $guru = new Guru();

        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Menyimpan guru baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama_guru' => $validated['nama_guru'],
            'nip' => $validated['nip'] ?? null,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail guru
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Form edit guru
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update guru
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama_guru' => $validated['nama_guru'],
            'nip' => $validated['nip'] ?? null,
        ];

        /*
        |--------------------------------------------------------------------------
        | FOTO BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (
                $guru->foto &&
                Storage::disk('public')->exists($guru->foto)
            ) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request
                ->file('foto')
                ->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Hapus guru
     */
    public function destroy(Guru $guru)
    {
        // Hapus foto dari storage
        if (
            $guru->foto &&
            Storage::disk('public')->exists($guru->foto)
        ) {
            Storage::disk('public')->delete($guru->foto);
        }

        // Hapus data guru
        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}