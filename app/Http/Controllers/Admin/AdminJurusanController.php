<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::orderBy('nama_jurusan')->paginate(10);

        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.form', ['jurusan' => new Jurusan()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.form', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $this->validated($request);

        if ($request->hasFile('gambar')) {
            if ($jurusan->gambar) {
                Storage::disk('public')->delete($jurusan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar) {
            Storage::disk('public')->delete($jurusan->gambar);
        }

        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama_jurusan' => ['required', 'string', 'max:255'],
            'singkatan'    => ['required', 'string', 'max:20'],
            'deskripsi'    => ['nullable', 'string'],
            'gambar'       => ['nullable', 'image', 'max:2048'],
        ]);
    }
}