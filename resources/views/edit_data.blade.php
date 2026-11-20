@extends('dashboard')

@section('content')
    <h1>{{ $judul }}</h1>

    <form method="post" action="/employe/{{ $employe->id }}" class="form-crud">
        @method('put')
        @csrf
        <table border="0" class="table-form">
            <tr>
                <td><label for="id">ID</label></td>
                <td><input type="text" id="id" name="id" value="{{ $employe->id }}" readonly style="background-color: #f1f5f9;"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" value="{{ $employe->nama }}" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" name="alamat" rows="2">{{ $employe->alamat }}</textarea></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td>
                    <select id="gender" name="gender">
                        <option value="L" {{ $employe->gender === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $employe->gender === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="gaji">Gaji</label></td>
                <td><input type="text" id="gaji" name="gaji" value="{{ $employe->gaji }}"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn-simpan">Update</button>
                    <a href="/employe" style="margin-left: 10px; color: navy; text-decoration: none;">&laquo; Kembali</a>
                </td>
            </tr>
        </table>
    </form>
@endsection
