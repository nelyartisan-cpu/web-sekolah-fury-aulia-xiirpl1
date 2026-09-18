<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Nama tabel database
    |--------------------------------------------------------------------------
    */

    protected $table = 'artikel';


    /*
    |--------------------------------------------------------------------------
    | Kolom yang boleh diisi
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'kategori_artikel_id',
        'judul',
        'isi',
        'gambar',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relasi kategori
    |--------------------------------------------------------------------------
    |
    | Kalau nanti ingin menampilkan kategori,
    | relasi ini sudah tersedia.
    |
    */

    public function kategori()
    {
        return $this->belongsTo(
            KategoriArtikel::class,
            'kategori_artikel_id'
        );
    }
}