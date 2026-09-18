<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProfilController extends Controller
{
    public function edit(): View
    {
        $profil = Profil::first();

        if (!$profil) {
            $profil = new Profil();
        }

        return view(
            'admin.profil.edit',
            compact('profil')
        );
    }


    public function update(Request $request): RedirectResponse
    {
        $request->validate([

            'nama_sekolah' => [
                'required',
                'string',
                'max:255'
            ],

            'sejarah' => [
                'nullable',
                'string'
            ],

            'visi' => [
                'nullable',
                'string'
            ],

            'misi' => [
                'nullable',
                'string'
            ],

            'alamat' => [
                'nullable',
                'string'
            ],

            'telepon' => [
                'nullable',
                'string',
                'max:30'
            ],

            'email' => [
                'nullable',
                'email',
                'max:255'
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);


        $profil = Profil::first();

        if (!$profil) {

            $profil = new Profil();

        }


        $profil->nama_sekolah = $request->nama_sekolah;

        $profil->sejarah = $request->sejarah;

        $profil->visi = $request->visi;

        $profil->misi = $request->misi;

        $profil->alamat = $request->alamat;

        $profil->telepon = $request->telepon;

        $profil->email = $request->email;


        if ($request->hasFile('logo')) {

            $path = $request
                ->file('logo')
                ->store('profil', 'public');

            $profil->logo = $path;
        }


        $profil->save();


        return redirect()
            ->route('admin.profil.edit')
            ->with(
                'success',
                'Profil sekolah berhasil diperbarui.'
            );
    }
}