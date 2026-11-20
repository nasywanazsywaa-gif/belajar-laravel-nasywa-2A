@extends('dashboard')

@section('content')
    <h1 style="margin-top: 0; margin-bottom: 12px; color: navy;">{{ $judul }}</h1>

    <div style="margin-bottom: 16px;">
        <a href="/employe/create">
            <button class="btn-tambah">+ Tambah data Pegawai</button>
        </a>
    </div>

    <table class="table-crud">
        <thead>
            <tr>
                <th style="width: 45px;">ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th style="width: 60px;">Gender</th>
                <th style="width: 130px;">Gaji</th>
                <th style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employes as $row)
                <tr>
                    <td class="col-id">{{ $row->id }}</td>
                    <td class="col-nama">{{ $row->nama }}</td>
                    <td class="col-alamat">{{ $row->alamat }}</td>
                    <td class="col-gender">{{ $row->gender }}</td>
                    <td class="col-gaji">{{ is_numeric($row->gaji) ? 'Rp ' . number_format($row->gaji, 0, ',', '.') : $row->gaji }}</td>
                    <td class="col-aksi">
                        <div class="action-group">
                            <a href="/employe/edit/{{ $row->id }}" class="btn-action btn-edit">Edit</a>
                            <form method="post" action="/employe/{{ $row->id }}" style="display: inline; margin: 0;">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 24px; color: #64748b;">
                        Belum ada data pegawai. Silakan klik tombol <strong>+ Tambah data Pegawai</strong>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
