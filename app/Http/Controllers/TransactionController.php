<?php

namespace App\Http\Controllers;

class TransactionController extends Controller
{
    // Menampilkan seluruh transaksi
    public function index()
    {
        $transaksi = config('transaksi');

        return view('transaksi.index', compact('transaksi'));
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show($id)
    {
        $transaksi = config('transaksi');

        $data = null;

        foreach ($transaksi as $item) {
            if ($item['id'] == $id) {
                $data = $item;
                break;
            }
        }

        // Jika ID tidak ditemukan
        if ($data == null) {
            abort(404);
        }

        return view('transaksi.detail', compact('data'));
    }

    // Menampilkan daftar kategori
    public function categories()
    {
        $transaksi = config('transaksi');
        $daftarKategori = [];

        foreach ($transaksi as $item) {
            if (!in_array($item['kategori'], $daftarKategori)) {
                $daftarKategori[] = $item['kategori'];
            }
        }

        return view('transaksi.kategori', compact('daftarKategori'));
    }

    // Menampilkan transaksi berdasarkan kategori
    public function byCategory($nama)
    {
        $transaksi = config('transaksi');
        $hasil = [];

        foreach ($transaksi as $item) {
            if (strtolower($item['kategori']) == strtolower($nama)) {
                $hasil[] = $item;
            }
        }

        return view('transaksi.hasil-kategori', [
            'transaksi' => $hasil,
            'namaKategori' => $nama
        ]);
    }

    // Menampilkan transaksi berdasarkan bulan
    public function byMonth($bulan)
    {
        $transaksi = config('transaksi');
        $hasil = [];

        foreach ($transaksi as $item) {
            $bulanTransaksi = substr($item['tanggal'], 0, 7);

            if ($bulanTransaksi == $bulan) {
                $hasil[] = $item;
            }
        }

        return view('transaksi.periode', [
            'transaksi' => $hasil,
            'bulan' => $bulan
        ]);
    }
}