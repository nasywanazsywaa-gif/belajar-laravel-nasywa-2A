<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeController extends Controller
{
    public function index(): View
    {
        $data['judul'] = 'CRUD data Pegawai';
        $data['employes'] = Employe::all();

        return view('tampil_data', $data);
    }

    public function create(): View
    {
        $data['judul'] = 'Tambah data Pegawai';

        return view('tambah_data', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $employe = new Employe;
        if ($request->filled('id')) {
            $employe->id = $request->id;
        }
        $employe->nama = $request->nama;
        $employe->alamat = $request->alamat;
        $employe->gender = $request->gender;
        $employe->gaji = $request->gaji;
        $employe->save();

        return redirect('/employe');
    }

    public function show(Employe $employe): View
    {
        $data['judul'] = 'Edit data Pegawai';
        $data['employe'] = $employe;

        return view('edit_data', $data);
    }

    public function update(Request $request, Employe $employe): RedirectResponse
    {
        $employe = Employe::find($employe->id);
        $employe->nama = $request->nama;
        $employe->alamat = $request->alamat;
        $employe->gender = $request->gender;
        $employe->gaji = $request->gaji;
        $employe->save();

        return redirect('/employe');
    }

    public function destroy(Employe $employe): RedirectResponse
    {
        $employe = Employe::find($employe->id);
        $employe->delete();

        return redirect('/employe');
    }
}
