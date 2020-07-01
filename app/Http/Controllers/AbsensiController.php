<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Menampilkan data absensi
        $absensi = \App\Absensi::latest()->paginate(5);
        $perusahaan = \App\Perusahaan::first();
        $bulan = \DB::table('absensis')
            ->select('bulan')
            ->distinct()
            ->get();
        $tahun = \DB::table('absensis')
            ->select('tahun')
            ->distinct()
            ->get();



        // Fitur Filter
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $b = $request->get('bulan');
            $t = $request->get('tahun');

            $absensi = \App\Absensi::where('name', 'like', "%$filterKeyword%")->where('bulan', "$b")->where('tahun', "$t")->paginate(20);
        }

        return view('absensis.index', ['absensi' => $absensi, 'bulan' => $bulan, 'tahun' => $tahun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = \App\Karyawan::all();

        return view('absensis.create', ['karyawan' => $karyawan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Tampung data untuk ditambahkan ke database
        $new_absen = new \App\Absensi;
        $new_absen->name = $request->get('name');
        $new_absen->bulan = $request->get('bulan');
        $new_absen->tahun = $request->get('tahun');
        $new_absen->jml_hadir = $request->get('hadir');
        $new_absen->jml_alfa = $request->get('alfa');
        $new_absen->jml_izin = $request->get('izin');
        $new_absen->jml_sakit = $request->get('sakit');
        $new_absen->jml_lembur = $request->get('lembur');

        $new_absen->save();

        return redirect()->route('absensis.index')->with('status', 'Data Kehadiran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit data absensi
        $absensi = \App\Absensi::findOrFail($id);
        $karyawan = \App\Karyawan::all();

        return view('absensis.edit', ['absensi' => $absensi, 'karyawan' => $karyawan]);
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
        // Update Data Kehadiran ke database
        $absen_update = \App\Absensi::findOrFail($id);

        $absen_update->name = $request->get('name');
        $absen_update->bulan = $request->get('bulan');
        $absen_update->tahun = $request->get('tahun');
        $absen_update->jml_hadir = $request->get('hadir');
        $absen_update->jml_alfa = $request->get('alfa');
        $absen_update->jml_izin = $request->get('izin');
        $absen_update->jml_sakit = $request->get('sakit');
        $absen_update->jml_lembur = $request->get('lembur');

        $absen_update->save();

        return redirect()->route('absensis.index', [$id])->with('status', 'Data Kehadiran berhasil diupdated');
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

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        \DB::table("absensis")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Data Kehadiran berhasil dihapus."]);
    }
}
