@extends('dashboard')

@section('content')
    <h1>{{ $judul }}</h1>

    <p style="margin-bottom: 15px;">
        <a href="/employe/create">
            <button class="btn-tambah">+ Tambah data Pegawai</button>
        </a>
    </p>

    <table class="table-crud" border="1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employes as $row)
                <tr>
                    <td class="text-center">{{ $row->id }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td class="text-center">{{ $row->gender }}</td>
                    <td>{{ is_numeric($row->gaji) ? 'Rp ' . number_format($row->gaji, 0, ',', '.') : $row->gaji }}</td>
                    <td class="text-center">
                        <a href="/employe/edit/{{ $row->id }}">
                            <button class="btn-edit">Edit</button>
                        </a>
                        |
                        <form method="post" action="/employe/{{ $row->id }}" style="display: inline-block;">
                            @method('delete')
                            @csrf
                            <button class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 20px; color: #64748b;">
                        Belum ada data pegawai. Silakan klik tombol <strong>+ Tambah data Pegawai</strong>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
