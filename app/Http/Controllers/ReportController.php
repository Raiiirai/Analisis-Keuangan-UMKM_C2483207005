<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    // Menghitung laporan laba dan rugi
    public function index()
    {
        $transaksi = config('transaksi');

        $totalPemasukan = 0;
        $totalPengeluaran = 0;

        foreach ($transaksi as $item) {

            if ($item['jenis'] == 'pemasukan') {
                $totalPemasukan += $item['jumlah'];
            } else {
                $totalPengeluaran += $item['jumlah'];
            }
        }

        $labaRugi = $totalPemasukan - $totalPengeluaran;

        if ($labaRugi > 0) {
            $status = 'Untung';
        } elseif ($labaRugi < 0) {
            $status = 'Rugi';
        } else {
            $status = 'Impas';
        }

        return view('laporan.index', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'labaRugi',
            'status'
        ));
    }

    // Menganalisis pengeluaran dan kondisi keuangan
    public function analysis()
    {
        $transaksi = config('transaksi');

        $pengeluaranKategori = [];

        // Mengelompokkan pengeluaran berdasarkan kategori
        foreach ($transaksi as $item) {

            if ($item['jenis'] == 'pengeluaran') {

                $kategori = $item['kategori'];

                if (!isset($pengeluaranKategori[$kategori])) {
                    $pengeluaranKategori[$kategori] = 0;
                }

                $pengeluaranKategori[$kategori] += $item['jumlah'];
            }
        }

        $totalPengeluaran = array_sum($pengeluaranKategori);

        // Menghitung persentase pengeluaran
        $analisisKategori = [];

        foreach ($pengeluaranKategori as $kategori => $jumlah) {

            if ($totalPengeluaran > 0) {
                $persentase = ($jumlah / $totalPengeluaran) * 100;
            } else {
                $persentase = 0;
            }

            $analisisKategori[] = [
                'kategori' => $kategori,
                'jumlah' => $jumlah,
                'persentase' => $persentase
            ];
        }

        // Mencari kategori pengeluaran terbesar
        $kategoriTerbesar = 'Belum ada pengeluaran';

        if (count($pengeluaranKategori) > 0) {
            arsort($pengeluaranKategori);
            $kategoriTerbesar = array_key_first($pengeluaranKategori);
        }

        // Membandingkan kondisi keuangan setiap bulan
        $laporanBulanan = [];

        foreach ($transaksi as $item) {

            $bulan = substr($item['tanggal'], 0, 7);

            if (!isset($laporanBulanan[$bulan])) {
                $laporanBulanan[$bulan] = [
                    'pemasukan' => 0,
                    'pengeluaran' => 0,
                    'laba' => 0
                ];
            }

            if ($item['jenis'] == 'pemasukan') {
                $laporanBulanan[$bulan]['pemasukan'] += $item['jumlah'];
            } else {
                $laporanBulanan[$bulan]['pengeluaran'] += $item['jumlah'];
            }
        }

        foreach ($laporanBulanan as $bulan => $data) {
            $laporanBulanan[$bulan]['laba'] =
                $data['pemasukan'] - $data['pengeluaran'];
        }

        ksort($laporanBulanan);

        return view('laporan.analisis', compact(
            'analisisKategori',
            'kategoriTerbesar',
            'totalPengeluaran',
            'laporanBulanan'
        ));
    }
}