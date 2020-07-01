@extends('layouts.global')

@section('title') Rincian Laporan @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('/laporans')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header row">
      <h2>Rincian Pengeluaran</h2>
      <a href="{{url('/karyawan/pdf')}}" class="btn btn-action btn-print"><i class="fas fa-print"></i> Cetak Laporan</a>
    </div>
    <div class="slip-gaji">
      <div class="header">
        <h2>Laporan Pengeluaran Keuangan</h2>
        <h2 class="brand-name">{{$perusahaan->nama_perusahaan}}</h2>
      </div>
      <div class="content-body">
        <div class="data-karyawan">
          <div class="left">
            <div class="label">
              <h3>Bulan</h3>
              <h3>Tahun</h3>
            </div>
            <div class="value">
              <p>: <span>{{$bulan}}</span></p>
              <p>: <span>{{$tahun}}</span></p>
            </div>
          </div>
          <div class="right">
            <div class="label">
              <h3>Tanggal Cetak</h3>
            </div>
            <div class="value">
              <p>: <span>{{$tanggal}}</span></p>
            </div>
          </div>
        </div>
        <hr>
        <div class="table-responsive-md">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="center" scope="col">No</th>
                <th class="center" scope="col">NIK</th>
                <th class="center" scope="col">Nama Karyawan</th>
                <th class="center" scope="col">Total Gaji</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              ?>
              @foreach($gaji as $g)
              <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
              <?php
              if (($g->jml_alfa && $g->jml_sakit && $g->jml_izin) == 0) {
                $insentif = $pendapatan->nm_makan * $g->jml_hadir;
              } else {
                $insentif = 0;
              };

              $total = $total + (
                ($g->gaji_pokok +
                  $pendapatan->nm_tunjangan +
                  ($pendapatan->nm_makan * $g->jml_hadir) +
                  ($g->jml_lembur * $pendapatan->nm_lembur) + $insentif)
                -
                (
                  ($g->jml_alfa * $potongan->nm_alfa) + ($g->jml_izin * $potongan->nm_izin) + ($g->jml_sakit * $potongan->nm_sakit)))
              ?>
              <tr>
                <th class="center" scope="row">1</th>
                <td class="center">{{$g->nik}}</td>
                <td class="center">{{$g->name}}</td>
                <td class="center">Rp {{number_format
              (
              (
                ($g->gaji_pokok + 
                $pendapatan->nm_tunjangan + 
                ($pendapatan->nm_makan*$g->jml_hadir) +
                ($g->jml_lembur*$pendapatan->nm_lembur) + $insentif
              ) 
              - 
              (
                ($g->jml_alfa*$potongan->nm_alfa)+($g->jml_izin*$potongan->nm_izin)+($g->jml_sakit*$potongan->nm_sakit)
              )
              ), 0)
            }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="total-fee">
          <h3>Total yang dibayarkan <strong>Rp {{number_format($total, 0)}}</strong></h3>
          <p><em>Mengetahui,</em></p>
          <h3 class="owner">Pimpinan Perusahaan</h3>
          <p>{{$perusahaan->nama_pimpinan}}</p>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Content End -->
@endsection