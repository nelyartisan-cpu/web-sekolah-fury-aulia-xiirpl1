<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak'; // singular, sesuai konvensi proyek

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
