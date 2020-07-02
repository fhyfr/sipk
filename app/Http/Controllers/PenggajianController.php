<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatan = \App\Jabatan::latest()->paginate(5);
        $potongan = \App\Potongan::paginate(2);
        $pendapatan = \App\Pendapatan::paginate(2);

        return view('penggajians.index', ['jabatan' => $jabatan, 'potongan' => $potongan, 'pendapatan' => $pendapatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penggajians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_jabatan = new \App\Jabatan;

        //  Tampung data untuk ditambahkan ke database
        if ($request->get('jabatan')) {
            $new_jabatan->jabatan = $request->get('jabatan');
            $new_jabatan->gaji_pokok = $request->get('gaji_pokok');
            $new_jabatan->insentif = $request->get('insentif');

            $new_jabatan->save();
        }

        return redirect()->route('penggajians.index')->with('status', 'Gaji Pokok Karyawan berhasil ditambahkan.');
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
        // Edit data jabatan
        $jabatan = \App\Jabatan::findOrFail($id);

        return view('penggajians.edit', ['jabatan' => $jabatan]);
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
        // Update data gaji pokok ke database

        $potongan = \App\Potongan::findOrFail($id);
        $pendapatan = \App\Pendapatan::findOrFail($id);

        if ($request->get('alfa') || $request->get('izin') || $request->get('sakit')) {
            $potongan->nm_alfa = $request->get('alfa');
            $potongan->nm_izin = $request->get('izin');
            $potongan->nm_sakit = $request->get('sakit');

            $potongan->save();

            return redirect()->route('penggajians.index', [$id])->with('status', 'Data Pengurangan Gaji berhasil diupdated');
        }

        if ($request->get('lembur') || $request->get('makan') || $request->get('tunjangan')) {

            $pendapatan->nm_lembur = $request->get('lembur');
            $pendapatan->nm_makan = $request->get('makan');
            $pendapatan->nm_tunjangan = $request->get('tunjangan');

            $pendapatan->save();

            return redirect()->route('penggajians.index', [$id])->with('status', 'Data Penambahan Gaji berhasil diupdated');
        }
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

    /**
     * Remove all resource which selected by checkbox from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        \DB::table("jabatans")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Data Golongan Deleted successfully."]);
    }

    public function perbarui(Request $request, $id)
    {
        $jabatan = \App\Jabatan::findOrFail($id);

        $jabatan->jabatan = $request->get('jabatan');
        $jabatan->gaji_pokok = $request->get('gaji_pokok');
        $jabatan->insentif = $request->get('insentif');

        $jabatan->save();
        return redirect()->route('penggajians.index', [$id])->with('status', 'Data Golongan dan Gaji Pokok berhasil diupdated');
    }
}
