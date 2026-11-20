@extends('dashboard')

@section('content')
    <h1>{{ $judul }}</h1>

    <form method="post" action="/employe/store" class="form-crud">
        @csrf
        <table border="0" class="table-form">
            <tr>
                <td><label for="id">ID</label></td>
                <td><input type="text" id="id" name="id" placeholder="Opsional (Auto increment jika kosong)"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" name="alamat" rows="2"></textarea></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td>
                    <select id="gender" name="gender">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="gaji">Gaji</label></td>
                <td><input type="text" id="gaji" name="gaji" placeholder="Contoh: 3000000"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn-simpan">SIMPAN</button>
                    <a href="/employe" style="margin-left: 10px; color: navy; text-decoration: none;">&laquo; Kembali</a>
                </td>
            </tr>
        </table>
    </form>
@endsection
