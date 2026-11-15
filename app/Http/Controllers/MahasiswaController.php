<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function daftar(): View
    {
        $mahasiswa = [
            [
                'id' => 'DE124321',
                'nama' => 'Anton',
                'email' => 'anton@gmail.com',
                'alamat' => 'Surabaya',
                'gender' => 'L',
                'initials' => 'AT',
                'avatar_bg' => '#e0e7ff',
                'avatar_color' => '#4338ca',
                'selected' => true,
            ],
            [
                'id' => 'DE124322',
                'nama' => 'Budi',
                'email' => 'budi@gmail.com',
                'alamat' => 'Kediri',
                'gender' => 'L',
                'initials' => 'BD',
                'avatar_bg' => '#fce7f3',
                'avatar_color' => '#db2777',
                'selected' => false,
            ],
            [
                'id' => 'DE124323',
                'nama' => 'Ani',
                'email' => 'ani@gmail.com',
                'alamat' => 'Malang',
                'gender' => 'P',
                'initials' => 'AN',
                'avatar_bg' => '#e0f2fe',
                'avatar_color' => '#0284c7',
                'selected' => false,
            ],
            [
                'id' => 'DE124324',
                'nama' => 'Sinta',
                'email' => 'sinta@gmail.com',
                'alamat' => 'Surabaya',
                'gender' => 'P',
                'initials' => 'ST',
                'avatar_bg' => '#ffedd5',
                'avatar_color' => '#ea580c',
                'selected' => false,
            ],
        ];

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }
}
