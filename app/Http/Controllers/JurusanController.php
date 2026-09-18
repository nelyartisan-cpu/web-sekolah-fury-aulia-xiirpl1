<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::latest()->paginate(9);
        return view('jurusan.index', compact('jurusan'));
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }
}
