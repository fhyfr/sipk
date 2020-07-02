<?php

namespace App\Http\Controllers;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use PDF;

use Illuminate\Support\Carbon;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gaji = \DB::table('karyawans')
            ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
            ->join('absensis', 'karyawans.name', '=', 'absensis.name')
            ->latest('absensis.created_at')
            ->paginate(5);
        $bulan = \DB::table('absensis')
            ->select('bulan')
            ->distinct()
            ->get();
        $tahun = \DB::table('absensis')
            ->select('tahun')
            ->distinct()
            ->get();

        $potongan = \App\Potongan::first();
        $pendapatan = \App\Pendapatan::first();

        // Fitur Filter
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {

            $b = $request->get('bulan');
            $t = $request->get('tahun');
            $gaji = \DB::table('karyawans')
                ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
                ->join('absensis', 'karyawans.name', '=', 'absensis.name')
                ->where('absensis.name', 'LIKE', '%' . $filterKeyword . '%')
                ->where('absensis.bulan', 'LIKE', '%' . $b . '%')
                ->where('absensis.tahun', 'LIKE', '%' . $t . '%')
                ->paginate(20);
        }

        return view('gajis.index', ['gaji' => $gaji, 'bulan' => $bulan, 'tahun' => $tahun, 'potongan' => $potongan, 'pendapatan' => $pendapatan]);
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
        $gaji = \DB::table('karyawans')
            ->join('absensis', 'karyawans.name', '=', 'absensis.name')
            ->join('jabatans', 'karyawans.jabatan', '=', 'jabatans.jabatan')
            ->where('absensis.id', $id)
            ->get();
        $perusahaan = \App\Perusahaan::first();

        // Set lokasi timezone ke indonesia (ID)
        \Carbon\Carbon::setLocale('id');
        $tanggal = CarbonImmutable::now()->isoFormat('dddd, D MMMM YYYY ');
        $slip = 'SIPK-' . rand(0, 9999);

        $potongan = \App\Potongan::first();
        $pendapatan = \App\Pendapatan::first();

        return view('gajis.show', ['gaji' => $gaji, 'potongan' => $potongan, 'pendapatan' => $pendapatan, 'perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'slip' => $slip]);
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
