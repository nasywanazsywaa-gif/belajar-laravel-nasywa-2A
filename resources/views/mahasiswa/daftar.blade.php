@extends('dashboard')

@section('content')
    <h2>DAFTAR MAHASISWA</h2>

    <table class="table-mahasiswa">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs['nama'] }}</td>
                    <td>{{ $mhs['alamat'] }}</td>
                    <td class="text-center">
                        <span class="badge-gender {{ $mhs['gender'] === 'L' ? 'gender-l' : 'gender-p' }}">
                            {{ $mhs['gender'] }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
