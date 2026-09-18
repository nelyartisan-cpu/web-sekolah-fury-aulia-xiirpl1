<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nama_guru',
        'nip',
        'foto',
    ];

    /**
     * Mengambil URL foto guru
     */
    public function fotoUrl()
    {
        if (!$this->foto) {
            return null;
        }

        return asset('storage/' . $this->foto);
    }
}