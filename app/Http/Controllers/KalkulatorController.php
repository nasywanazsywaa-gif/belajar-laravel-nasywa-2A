<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KalkulatorController extends Controller
{
    public function segitiga(Request $request): View
    {
        $luas = null;

        if ($request->isMethod('post')) {
            $alas = (float) $request->input('alas');
            $tinggi = (float) $request->input('tinggi');
            $luas = 0.5 * $alas * $tinggi;
        }

        return view('kalkulator.segitiga', compact('luas'));
    }
}
