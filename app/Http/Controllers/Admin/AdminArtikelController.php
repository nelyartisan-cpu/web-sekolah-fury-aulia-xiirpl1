<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminArtikelController extends Controller
{
    /**
     * Menampilkan semua artikel
     */
    public function index(Request $request)
    {
        $query = Artikel::with('kategori')
            ->latest();

        // Pencarian judul
        if ($request->filled('q')) {
            $query->where(
                'judul',
                'like',
                '%' . $request->q . '%'
            );
        }

        $artikel = $query
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.artikel.index',
            compact('artikel')
        );
    }

    /**
     * Form tambah artikel
     */
    public function create()
    {
        $kategori = KategoriArtikel::orderBy(
            'nama_kategori'
        )->get();

        return view(
            'admin.artikel.create',
            compact('kategori')
        );
    }

    /**
     * Simpan artikel
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_artikel_id' => [
                'required',
                'exists:kategori_artikel,id'
            ],

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
        ], [
            'kategori_artikel_id.required' =>
                'Kategori artikel wajib dipilih.',

            'kategori_artikel_id.exists' =>
                'Kategori artikel tidak ditemukan.',

            'judul.required' =>
                'Judul artikel wajib diisi.',

            'isi.required' =>
                'Isi artikel wajib diisi.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',
        ]);

        $namaGambar = null;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR TANPA STORAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path('images/artikel');

            // Buat folder jika belum ada
            if (!file_exists($folder)) {
                mkdir(
                    $folder,
                    0755,
                    true
                );
            }

            $file = $request->file('gambar');

            $namaGambar =
                time() .
                '_' .
                Str::random(10) .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $namaGambar
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Artikel::create([
            'kategori_artikel_id' =>
                $request->kategori_artikel_id,

            'judul' =>
                $request->judul,

            'isi' =>
                $request->isi,

            'gambar' =>
                $namaGambar,
        ]);

        return redirect()
            ->route('admin.artikel.index')
            ->with(
                'success',
                'Artikel berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail artikel
     */
    public function show(Artikel $artikel)
    {
        $artikel->load('kategori');

        return view(
            'admin.artikel.show',
            compact('artikel')
        );
    }

    /**
     * Form edit artikel
     */
    public function edit(Artikel $artikel)
    {
        $kategori = KategoriArtikel::orderBy(
            'nama_kategori'
        )->get();

        return view(
            'admin.artikel.edit',
            compact(
                'artikel',
                'kategori'
            )
        );
    }

    /**
     * Update artikel
     */
    public function update(
        Request $request,
        Artikel $artikel
    ) {
        $request->validate([
            'kategori_artikel_id' => [
                'required',
                'exists:kategori_artikel,id'
            ],

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
        ], [
            'kategori_artikel_id.required' =>
                'Kategori artikel wajib dipilih.',

            'judul.required' =>
                'Judul artikel wajib diisi.',

            'isi.required' =>
                'Isi artikel wajib diisi.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',
        ]);

        $namaGambar = $artikel->gambar;

        /*
        |--------------------------------------------------------------------------
        | GANTI GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path(
                'images/artikel'
            );

            if (!file_exists($folder)) {
                mkdir(
                    $folder,
                    0755,
                    true
                );
            }

            // Hapus gambar lama
            if (
                $artikel->gambar &&
                file_exists(
                    $folder . '/' . $artikel->gambar
                )
            ) {
                unlink(
                    $folder . '/' . $artikel->gambar
                );
            }

            $file = $request->file('gambar');

            $namaGambar =
                time() .
                '_' .
                Str::random(10) .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $namaGambar
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $artikel->update([
            'kategori_artikel_id' =>
                $request->kategori_artikel_id,

            'judul' =>
                $request->judul,

            'isi' =>
                $request->isi,

            'gambar' =>
                $namaGambar,
        ]);

        return redirect()
            ->route('admin.artikel.index')
            ->with(
                'success',
                'Artikel berhasil diperbarui.'
            );
    }

    /**
     * Hapus artikel
     */
    public function destroy(Artikel $artikel)
    {
        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($artikel->gambar) {

            $path = public_path(
                'images/artikel/' .
                $artikel->gambar
            );

            if (file_exists($path)) {
                unlink($path);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $artikel->delete();

        return redirect()
            ->route('admin.artikel.index')
            ->with(
                'success',
                'Artikel berhasil dihapus.'
            );
    }
}