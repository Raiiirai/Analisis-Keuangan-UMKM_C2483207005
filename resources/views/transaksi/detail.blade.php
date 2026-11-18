@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

    <h1>Detail Transaksi</h1>

    <div class="card">

        <p><strong>ID Transaksi:</strong> {{ $data['id'] }}</p>

        <p><strong>Tanggal:</strong> {{ $data['tanggal'] }}</p>

        <p><strong>Keterangan:</strong> {{ $data['keterangan'] }}</p>

        <p><strong>Kategori:</strong> {{ $data['kategori'] }}</p>

        <p><strong>Jenis:</strong> {{ $data['jenis'] }}</p>

        <p>
            <strong>Jumlah:</strong>
            Rp {{ number_format($data['jumlah'], 0, ',', '.') }}
        </p>

        <a class="button" href="{{ route('transaksi.index') }}">
            Kembali
        </a>

    </div>

@endsection