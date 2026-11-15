@extends('layouts.app')

@section('title', 'Kalkulator Luas Segitiga')
@section('page_title', 'Kalkulator Segitiga')

@push('styles')
<style>
    .calc-container {
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 10px 25px -5px rgba(0, 0, 0, 0.02);
        border: 1px solid #edf2f7;
        padding: 28px 32px;
        max-width: 560px;
    }

    .calc-header {
        margin-bottom: 24px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 16px;
    }

    .calc-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .calc-desc {
        font-size: 13.5px;
        color: #64748b;
        line-height: 1.5;
    }

    .formula-box {
        background-color: #f8fafc;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 24px;
        font-size: 13.5px;
        color: #334155;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .formula-box code {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        background-color: #e2e8f0;
        padding: 3px 8px;
        border-radius: 6px;
        font-weight: 600;
        color: #1e293b;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13.5px;
        font-weight: 600;
        color: #334155;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-control {
        width: 100%;
        height: 44px;
        padding: 10px 50px 10px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        color: #0f172a;
        background-color: #ffffff;
        font-family: inherit;
        outline: none;
        transition: all 0.2s ease;
    }

    .input-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
    }

    .input-unit {
        position: absolute;
        right: 16px;
        font-size: 13px;
        font-weight: 500;
        color: #94a3b8;
        pointer-events: none;
    }

    .btn-submit {
        width: 100%;
        height: 44px;
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-family: inherit;
        box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
    }

    .btn-submit:hover {
        background-color: #1d4ed8;
    }

    .result-card {
        margin-top: 24px;
        padding: 18px 20px;
        background-color: #ecfdf5;
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .result-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background-color: #10b981;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .result-label {
        font-size: 12.5px;
        font-weight: 600;
        color: #065f46;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .result-value {
        font-size: 20px;
        font-weight: 700;
        color: #064e3b;
    }
</style>
@endpush

@section('content')
<div class="calc-container">
    <div class="calc-header">
        <h2 class="calc-title">Perhitungan Luas Segitiga</h2>
        <p class="calc-desc">Masukkan nilai alas dan tinggi segitiga untuk menghitung luas secara otomatis.</p>
    </div>

    <div class="formula-box">
        <span>Rumus:</span>
        <code>Luas = ½ × alas × tinggi</code>
    </div>

    <form method="POST" action="{{ route('kalkulator.segitiga') }}">
        @csrf
        <div class="form-group">
            <label class="form-label" for="alas">Panjang Alas</label>
            <div class="input-wrapper">
                <input
                    type="number"
                    step="any"
                    min="0"
                    id="alas"
                    name="alas"
                    class="input-control"
                    placeholder="Contoh: 10"
                    value="{{ request('alas') }}"
                    required
                >
                <span class="input-unit">cm</span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="tinggi">Tinggi Segitiga</label>
            <div class="input-wrapper">
                <input
                    type="number"
                    step="any"
                    min="0"
                    id="tinggi"
                    name="tinggi"
                    class="input-control"
                    placeholder="Contoh: 15"
                    value="{{ request('tinggi') }}"
                    required
                >
                <span class="input-unit">cm</span>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="16" height="20" x="4" y="2" rx="2"></rect>
                <line x1="8" x2="16" y1="6" y2="6"></line>
                <line x1="16" x2="16" y1="14" y2="18"></line>
            </svg>
            Hitung Luas Sekarang
        </button>
    </form>

    @if (!is_null($luas))
        <div class="result-card">
            <div class="result-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <div>
                <div class="result-label">Hasil Perhitungan</div>
                <div class="result-value">{{ $luas }} cm²</div>
            </div>
        </div>
    @endif
</div>
@endsection
