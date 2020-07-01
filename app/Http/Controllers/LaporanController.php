<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil data gaji bulan dan tahun dari tabel absensi

        $bln = \DB::table('absensis')
            ->select('bulan')
            ->distinct()
            ->get();
        $th = \DB::table('absensis')
            ->select('tahun')
            ->distinct()
            ->get();
        $gaji = null;

        if ($request->get('bulan')) {
            $perusahaan = \App\Perusahaan::first();
            $bulan = $request->get('bulan');
            $tahun = $request->get('tahun');
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

            return view('laporans.show', ['gaji' => $gaji, 'bulan' => $bulan, 'tahun' => $tahun, 'perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'pendapatan' => $pendapatan, 'potongan' => $potongan]);
        }

        return view('laporans.index', ['bln' => $bln, 'th' => $th, 'gaji' => $gaji]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('laporans.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
