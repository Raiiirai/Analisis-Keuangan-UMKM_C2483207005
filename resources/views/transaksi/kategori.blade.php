@extends('layouts.app')

@section('title', 'Kategori Transaksi')

@section('content')

    <h1>Kategori Transaksi</h1>

    <p>Pilih kategori untuk melihat catatan transaksi.</p>

    <div class="card">

        @foreach ($daftarKategori as $kategori)

            <p>
                <a href="{{ route('kategori.show', $kategori) }}">
                    {{ $kategori }}
                </a>
            </p>

        @endforeach

    </div>

@endsection