<?php

// app/Http/Controllers/Admin/AdminEkstrakurikulerController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::with('guru')->latest()->paginate(10);
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        $gurus = Guru::orderBy('nama_guru')->get();
        return view('admin.ekstrakurikuler.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id'    => 'nullable|exists:guru,id',
            'nama_eskul' => 'required|string|max:255',
            'pembina'    => 'nullable|string|max:255',
            'deskripsi'  => 'nullable|string',
            'logo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        $gurus = Guru::orderBy('nama_guru')->get();
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler', 'gurus'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'guru_id'    => 'nullable|exists:guru,id',
            'nama_eskul' => 'required|string|max:255',
            'pembina'    => 'nullable|string|max:255',
            'deskripsi'  => 'nullable|string',
            'logo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($ekstrakurikuler->logo) {
                Storage::disk('public')->delete($ekstrakurikuler->logo);
            }
            $validated['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->logo) {
            Storage::disk('public')->delete($ekstrakurikuler->logo);
        }
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}