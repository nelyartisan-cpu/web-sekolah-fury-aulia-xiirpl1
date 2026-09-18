<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(): View
    {
        $profil = Profil::first();

        return view('profil.index', compact('profil'));
    }
}