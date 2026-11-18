@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard Keuangan</h1>

    <p>Ringkasan kondisi keuangan usaha.</p>

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

        <h2>Transaksi Terakhir</h2>

        <table>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Detail</th>
            </tr>

            @foreach ($transaksiTerakhir as $item)
                <tr>
                    <td>{{ $item['tanggal'] }}</td>
                    <td>{{ $item['keterangan'] }}</td>

                    <td>
                        @if ($item['jenis'] == 'pemasukan')
                            <span class="income">Pemasukan</span>
                        @else
                            <span class="expense">Pengeluaran</span>
                        @endif
                    </td>

                    <td>
                        Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                    </td>

                    <td>
                        <a href="{{ route('transaksi.detail', $item['id']) }}">
                            Lihat
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

    <a class="button" href="{{ route('transaksi.index') }}">
        Lihat Semua Transaksi
    </a>

@endsection