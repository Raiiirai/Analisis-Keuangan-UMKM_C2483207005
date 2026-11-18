<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi
        $transaksi = config('transaksi', []);

        // Menyiapkan variabel perhitungan
        $totalPemasukan = 0;
        $totalPengeluaran = 0;

        // Menghitung total pemasukan dan pengeluaran
        foreach ($transaksi as $item) {

            if ($item['jenis'] == 'pemasukan') {

                $totalPemasukan += $item['jumlah'];

            } elseif ($item['jenis'] == 'pengeluaran') {

                $totalPengeluaran += $item['jumlah'];

            }
        }

        // Menghitung laba atau rugi
        $labaRugi = $totalPemasukan - $totalPengeluaran;

        // Mengambil 5 transaksi terakhir
        $transaksiTerakhir = array_slice($transaksi, -5);
        $transaksiTerakhir = array_reverse($transaksiTerakhir);

        // Mengirim data ke halaman dashboard
        return view('dashboard', [
            'transaksi' => $transaksi,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'labaRugi' => $labaRugi,
            'transaksiTerakhir' => $transaksiTerakhir
        ]);
    }
}