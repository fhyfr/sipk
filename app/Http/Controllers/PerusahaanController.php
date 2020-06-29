<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil semua data perusahaan
        $perusahaan = \App\Perusahaan::all();

        return view("perusahaans.index", ['perusahaan' => $perusahaan]);
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
        // Edit data user
        $perusahaan = \App\Perusahaan::findOrFail($id);

        return view('perusahaans.edit', ['perusahaan' => $perusahaan]);
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
        // Update data user ke database
        $perusahaan = \App\Perusahaan::findOrFail($id);

        $perusahaan->nama_perusahaan = $request->get('nama_perusahaan');
        $perusahaan->nama_pimpinan = $request->get('nama_pimpinan');
        $perusahaan->alamat = $request->get('alamat');
        $perusahaan->telepon = $request->get('telepon');

        $perusahaan->save();

        return redirect()->route('perusahaans.index', [$id])->with('status', 'Data Pengaturan umum aplikasi berhasil diupdated');
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
