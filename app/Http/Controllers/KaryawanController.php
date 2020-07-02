<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

use DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Menampilkan data karyawan
        $karyawan = \App\Karyawan::latest()->paginate(5);

        // Fitur Filter 

        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {

            $karyawan = \App\Karyawan::where('nik', 'like', "%$filterKeyword%")->orWhere('name', 'like', "%$filterKeyword%")->orWhere('jabatan', 'like', "%$filterKeyword%")->orWhere('jk', 'like', "%$filterKeyword%")->orWhere('agama', 'like', "%$filterKeyword%")->orWhere('telepon', 'like', "%$filterKeyword%")->paginate(20);
        }

        return view('karyawans.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = \App\Jabatan::all();

        return view('karyawans.create', ['jabatan' => $jabatan]);
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
        $new_karyawan = new \App\Karyawan;
        $new_karyawan->nik = $request->get('nik');
        $new_karyawan->name = $request->get('name');
        $new_karyawan->jabatan = $request->get('jabatan');
        $new_karyawan->jk = $request->get('jk');
        $new_karyawan->agama = $request->get('agama');
        $new_karyawan->telepon = $request->get('telepon');


        $new_karyawan->save();

        return redirect()->route('karyawans.index')->with('status', 'Data Karyawan berhasil ditambahkan.');
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
        //Edit data karyawan
        $karyawan = \App\Karyawan::findOrFail($id);
        $jabatan = \App\Jabatan::all();

        return view('karyawans.edit', ['karyawan' => $karyawan, 'jabatan' => $jabatan]);
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
        // Update data karyawan ke database
        $karyawan = \App\Karyawan::findOrFail($id);

        $karyawan->nik = $request->get('nik');
        $karyawan->name = $request->get('name');
        $karyawan->jabatan = $request->get('jabatan');
        $karyawan->jk = $request->get('jk');
        $karyawan->agama = $request->get('agama');
        $karyawan->telepon = $request->get('telepon');

        $karyawan->save();

        return redirect()->route('karyawans.index', [$id])->with('status', 'Data Karyawan berhasil diupdated');
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
        \DB::table("karyawans")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Karyawan berhasil dihapus."]);
    }
}
