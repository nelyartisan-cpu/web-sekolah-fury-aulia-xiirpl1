<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikulers';

    protected $fillable = [
        'nama_eskul',
        'logo',
        'pembina',
        'guru_id',
        'deskripsi',
    ];

    /**
     * Relasi ke guru pembina.
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}