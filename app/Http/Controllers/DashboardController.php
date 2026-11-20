<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function home(): View
    {
        $data['judul'] = 'Laman Home';
        $data['isi'] = 'Lorem ipsum dolor sit amet';

        return view('home', $data);
    }

    public function gallery(): View
    {
        $data['judul'] = 'Laman Gallery';

        return view('gallery', $data);
    }

    public function about(): View
    {
        $data['judul'] = 'Laman About';

        return view('about', $data);
    }
}
