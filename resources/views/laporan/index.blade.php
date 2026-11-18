@extends('layouts.app')

@section('title', 'Laporan Laba Rugi')

@section('content')

    <h1>Laporan Laba Rugi</h1>

    <p>Ringkasan keseluruhan kondisi keuangan UMKM.</p>

    <div class="container-card">

        <div class="summary">
            <h3>Total Pemasukan</h3>
            <h2 class="income">
                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
            </h2>
        </div>

        <div class="summary">
            <h3>Total Pengeluaran</h3>
            <h2 class="expense">
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </h2>
        </div>

        <div class="summary">
            <h3>Laba / Rugi</h3>
            <h2>
                Rp {{ number_format($labaRugi, 0, ',', '.') }}
            </h2>
        </div>

    </div>

    <div class="card">

        <h2>Kesimpulan Keuangan</h2>

        <p>
            Status keuangan usaha saat ini adalah:

            @if ($status == 'Untung')
                <strong class="profit">UNTUNG</strong>
            @elseif ($status == 'Rugi')
                <strong class="loss">RUGI</strong>
            @else
                <strong>IMPAS</strong>
            @endif
        </p>

        <p>
            Laba atau rugi diperoleh dari total pemasukan
            dikurangi total pengeluaran.
        </p>

    </div>

@endsection