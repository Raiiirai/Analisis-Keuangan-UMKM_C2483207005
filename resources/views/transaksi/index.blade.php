@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')

    <h1>Daftar Transaksi</h1>

    <p>Seluruh catatan pemasukan dan pengeluaran usaha.</p>

    <div class="card">

        <table>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Detail</th>
            </tr>

            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['tanggal'] }}</td>
                    <td>{{ $item['keterangan'] }}</td>
                    <td>{{ $item['kategori'] }}</td>

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
                            Detail
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

@endsection