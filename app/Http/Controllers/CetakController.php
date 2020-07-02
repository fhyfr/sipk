<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

class CetakController extends Controller
{
    // fungsi print Slip Gaji PDF
    public function slip_pdf($nama, $bulan, $tahun)
    {
        $perusahaan = \App\Perusahaan::first();
        $potongan = \App\Potongan::first();
        $pendapatan = \App\Pendapatan::first();

        // Set lokasi timezone ke indonesia (ID)
        \Carbon\Carbon::setLocale('id');
        $tanggal = CarbonImmutable::now()->isoFormat('dddd, D MMMM YYYY ');
        $slip = 'SIPK-' . rand(0, 9999);

        $gaji = \DB::table('karyawans')
            ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
            ->join('absensis', 'karyawans.name', '=', 'absensis.name')
            ->where('absensis.name', 'LIKE', '%' . $nama . '%')
            ->where('absensis.bulan', 'LIKE', '%' . $bulan . '%')
            ->where('absensis.tahun', 'LIKE', '%' . $tahun . '%')
            ->get();


        set_time_limit(300);

        // fungsi cetak pdf
        $pdf = PDF::loadview('print.slip', ['perusahaan' => $perusahaan, 'potongan' => $potongan, 'pendapatan' => $pendapatan, 'tanggal' => $tanggal, 'slip' => $slip, 'gaji' => $gaji]);


        return $pdf->stream('Slip_gaji_' . $slip . '-' . $tahun . '.pdf');
    }

    // fungsi print Laporan Gaji PDF
    public function laporan_pdf($bulan, $tahun)
    {
        $perusahaan = \App\Perusahaan::first();
        // Set lokasi timezone ke indonesia (ID)
        \Carbon\Carbon::setLocale('id');
        $tanggal = CarbonImmutable::now()->isoFormat('dddd, D MMMM YYYY ');

        $potongan = \App\Potongan::first();
        $pendapatan = \App\Pendapatan::first();

        $gaji = \DB::table('karyawans')
            ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
            ->join('absensis', 'karyawans.name', '=', 'absensis.name')
            ->where('absensis.bulan', 'LIKE', '%' . $bulan . '%')
            ->where('absensis.tahun', 'LIKE', '%' . $tahun . '%')
            ->get();

        set_time_limit(300);

        // fungsi cetak pdf
        $pdf = PDF::loadview('print.laporan', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'bulan' => $bulan, 'tahun' => $tahun, 'potongan' => $potongan, 'pendapatan' => $pendapatan, 'gaji' => $gaji]);

        return $pdf->stream('Laporan_Keuangan_' . $bulan . '_' . $tahun . '.pdf');
    }

    // fungsi cetak semua slip gaji
    public function cetak_semua()
    {
        $perusahaan = \App\Perusahaan::first();
        // Set lokasi timezone ke indonesia (ID)
        \Carbon\Carbon::setLocale('id');
        $tanggal = CarbonImmutable::now()->isoFormat('dddd, D MMMM YYYY ');

        $potongan = \App\Potongan::first();
        $pendapatan = \App\Pendapatan::first();
        $slip = 'SIPK-' . rand(0, 9999);

        $gaji = \DB::table('karyawans')
            ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
            ->join('absensis', 'karyawans.name', '=', 'absensis.name')
            ->get();

        set_time_limit(300);

        // fungsi cetak pdf
        $pdf = PDF::loadview('print.slip', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'potongan' => $potongan, 'pendapatan' => $pendapatan, 'gaji' => $gaji, 'slip' => $slip]);

        return $pdf->stream('Slip_Gaji_Semua_Karyawan.pdf');
    }
}
