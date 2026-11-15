@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('page_title', 'Daftar Mahasiswa')

@push('styles')
<style>
    .card-container {
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 10px 25px -5px rgba(0, 0, 0, 0.02);
        border: 1px solid #edf2f7;
        padding: 24px 28px;
        overflow: hidden;
    }

    .card-header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .card-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        letter-spacing: -0.4px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-icon {
        position: absolute;
        left: 14px;
        width: 17px;
        height: 17px;
        color: #94a3b8;
        pointer-events: none;
    }

    .search-input {
        height: 42px;
        width: 240px;
        padding: 8px 16px 8px 38px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        font-size: 14px;
        color: #1e293b;
        font-family: inherit;
        outline: none;
        transition: all 0.2s ease;
    }

    .search-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        width: 270px;
    }

    .filter-btn {
        height: 42px;
        padding: 0 18px;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        color: #334155;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .filter-btn:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }

    .filter-btn svg {
        width: 16px;
        height: 16px;
        color: #64748b;
    }

    /* Table Component */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .styled-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        text-align: left;
    }

    .styled-table thead th {
        font-size: 13px;
        font-weight: 500;
        color: #64748b;
        padding: 14px 16px;
        border-bottom: 1px solid #f1f5f9;
        white-space: nowrap;
    }

    .styled-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #f8fafc;
        vertical-align: middle;
        font-size: 14px;
        color: #334155;
        background-color: #ffffff;
        transition: background-color 0.15s ease;
    }

    .styled-table tbody tr:hover td {
        background-color: #fbfcfe;
    }

    /* Checkbox design matching the screenshot */
    .checkbox-col {
        width: 44px;
        text-align: center;
        padding-left: 8px !important;
        padding-right: 8px !important;
    }

    .circle-checkbox {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #cbd5e1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        background-color: transparent;
    }

    .circle-checkbox.checked {
        background-color: #4f46e5;
        border-color: #4f46e5;
        color: #ffffff;
    }

    .circle-checkbox.checked svg {
        width: 12px;
        height: 12px;
        stroke-width: 3;
    }

    .circle-checkbox:hover:not(.checked) {
        border-color: #94a3b8;
    }

    /* ID Column */
    .item-id {
        font-weight: 600;
        color: #0f172a;
        font-size: 14px;
    }

    /* Customer / Mahasiswa column with avatar */
    .user-profile {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 13px;
        flex-shrink: 0;
    }

    .user-details {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-weight: 600;
        color: #0f172a;
        font-size: 14px;
        line-height: 1.3;
    }

    .user-email {
        font-size: 12.5px;
        color: #64748b;
        line-height: 1.3;
    }

    /* Address / Alamat */
    .item-address {
        color: #475569;
        font-weight: 500;
    }

    /* Status Pill Badges */
    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 4px 14px;
        border-radius: 9999px;
        font-size: 12.5px;
        font-weight: 600;
        letter-spacing: 0.1px;
    }

    .status-badge.complete {
        background-color: #ecfdf5;
        color: #10b981;
    }

    .status-badge.pending {
        background-color: #fffbeb;
        color: #d97706;
    }

    .status-badge.gender-p {
        background-color: #fff1f2;
        color: #e11d48;
    }

    /* Action column */
    .action-col {
        text-align: right;
        padding-right: 20px !important;
    }

    .action-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        color: #94a3b8;
        padding: 6px;
        border-radius: 6px;
        transition: all 0.15s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .action-btn:hover {
        color: #ef4444;
        background-color: #fef2f2;
    }

    .action-btn svg {
        width: 17px;
        height: 17px;
    }
</style>
@endpush

@section('content')
<div class="card-container">
    <div class="card-header-bar">
        <h2 class="card-title">Daftar Mahasiswa</h2>
        <div class="header-actions">
            <div class="search-wrapper">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" class="search-input" placeholder="Search..." id="searchMahasiswa">
            </div>
            <button type="button" class="filter-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="4" y1="21" y2="14"></line>
                    <line x1="4" x2="4" y1="10" y2="3"></line>
                    <line x1="12" x2="12" y1="21" y2="12"></line>
                    <line x1="12" x2="12" y1="8" y2="3"></line>
                    <line x1="20" x2="20" y1="21" y2="16"></line>
                    <line x1="20" x2="20" y1="12" y2="3"></line>
                    <line x1="1" x2="7" y1="14" y2="14"></line>
                    <line x1="9" x2="15" y1="8" y2="8"></line>
                    <line x1="17" x2="23" y1="16" y2="16"></line>
                </svg>
                Filter
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="checkbox-col">
                        <div class="circle-checkbox" title="Pilih Semua"></div>
                    </th>
                    <th>ID Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th class="action-col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td class="checkbox-col">
                            <div class="circle-checkbox {{ $mhs['selected'] ?? false ? 'checked' : '' }}">
                                @if ($mhs['selected'] ?? false)
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="item-id">{{ $mhs['id'] }}</span>
                        </td>
                        <td>
                            <div class="user-profile">
                                <div class="user-avatar" style="background-color: {{ $mhs['avatar_bg'] }}; color: {{ $mhs['avatar_color'] }};">
                                    {{ $mhs['initials'] }}
                                </div>
                                <div class="user-details">
                                    <span class="user-name">{{ $mhs['nama'] }}</span>
                                    <span class="user-email">{{ $mhs['email'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="item-address">{{ $mhs['alamat'] }}</span>
                        </td>
                        <td>
                            <span class="status-badge {{ $mhs['gender'] === 'L' ? 'complete' : 'pending' }}">
                                {{ $mhs['gender'] === 'L' ? 'L (Laki-laki)' : 'P (Perempuan)' }}
                            </span>
                        </td>
                        <td>
                            <span class="status-badge complete">Complete</span>
                        </td>
                        <td class="action-col">
                            <button type="button" class="action-btn" title="Hapus">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 1-2h6c1 0 2 1 2 2v2"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
