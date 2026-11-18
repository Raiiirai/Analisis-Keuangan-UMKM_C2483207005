@extends('layouts.app')

@section('title', 'Analisis Keuangan')

@section('content')

    <h1>Analisis Keuangan</h1>

    <div class="card">

        <h2>Analisis Pengeluaran Terbesar</h2>

        <p>
            Total seluruh pengeluaran:
            <strong>
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </strong>
        </p>

        <p>
            Kategori dengan pengeluaran terbesar:
            <strong>{{ $kategoriTerbesar }}</strong>
        </p>

    </div>

    <div class="card">

        <h2>Pengeluaran Berdasarkan Kategori</h2>

        <table>
            <tr>
                <th>Kategori</th>
                <th>Jumlah Pengeluaran</th>
                <th>Persentase</th>
            </tr>

            @foreach ($analisisKategori as $item)
                <tr>
                    <td>{{ $item['kategori'] }}</td>

                    <td>
                        Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                    </td>

                    <td>
                        {{ number_format($item['persentase'], 1, ',', '.') }}%
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

    <div class="card">

        <h2>Perbandingan Keuangan Bulanan</h2>

        <table>
            <tr>
                <th>Bulan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Laba / Rugi</th>
                <th>Kondisi</th>
            </tr>

            @foreach ($laporanBulanan as $bulan => $data)
                <tr>

                    <td>{{ $bulan }}</td>

                    <td>
                        Rp {{ number_format($data['pemasukan'], 0, ',', '.') }}
                    </td>

                    <td>
                        Rp {{ number_format($data['pengeluaran'], 0, ',', '.') }}
                    </td>

                    <td>
                        Rp {{ number_format($data['laba'], 0, ',', '.') }}
                    </td>

                    <td>
                        @if ($data['laba'] > 0)
                            <span class="profit">Untung</span>
                        @elseif ($data['laba'] < 0)
                            <span class="loss">Rugi</span>
                        @else
                            Impas
                        @endif
                    </td>

                </tr>
            @endforeach

        </table>

    </div>

@endsection