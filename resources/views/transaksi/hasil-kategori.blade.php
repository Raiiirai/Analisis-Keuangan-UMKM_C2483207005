@extends('layouts.app')

@section('title', 'Transaksi Berdasarkan Kategori')

@section('content')

    <h1>Kategori: {{ $namaKategori }}</h1>

    <div class="card">

        @if (count($transaksi) > 0)

            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                </tr>

                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ $item['keterangan'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>
                            Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach

            </table>

        @else

            <p>Tidak ada transaksi pada kategori ini.</p>

        @endif

        <br>

        <a class="button" href="{{ route('kategori.index') }}">
            Kembali ke Kategori
        </a>

    </div>

@endsection