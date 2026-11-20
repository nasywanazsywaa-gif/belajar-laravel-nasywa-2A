@extends('dashboard')

@section('content')
    <h2>Perhitungan Luas Segitiga</h2>
    <p>Gunakan form berikut untuk menghitung luas segitiga (Rumus: ½ × alas × tinggi):</p>

    <form method="POST" action="{{ route('kalkulator.segitiga') }}" class="form-segitiga">
        @csrf
        <div class="form-row">
            <label for="alas">Panjang Alas (cm):</label>
            <input
                type="number"
                step="any"
                min="0"
                id="alas"
                name="alas"
                value="{{ request('alas') }}"
                required
            >
        </div>

        <div class="form-row">
            <label for="tinggi">Tinggi Segitiga (cm):</label>
            <input
                type="number"
                step="any"
                min="0"
                id="tinggi"
                name="tinggi"
                value="{{ request('tinggi') }}"
                required
            >
        </div>

        <button type="submit" class="btn-hitung">Hitung Luas</button>
    </form>

    @if (!is_null($luas))
        <div class="hasil-box">
            <strong>Hasil Perhitungan:</strong>
            <p>Luas Segitiga = <strong>{{ $luas }} cm²</strong></p>
        </div>
    @endif
@endsection
