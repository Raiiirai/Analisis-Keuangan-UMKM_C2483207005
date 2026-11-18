@extends('layouts.app')

@section('title', 'Transaksi Berdasarkan Periode')

@section('content')

    <h1>Transaksi Periode {{ $bulan }}</h1>

    <div class="card">

        @if (count($transaksi) > 0)

            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                </tr>

                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ $item['keterangan'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>
                            Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach

            </table>

        @else

            <p>Tidak ditemukan transaksi untuk periode ini.</p>

        @endif

    </div>

@endsection