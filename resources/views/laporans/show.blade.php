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
      <a href="{{url('/cetak/laporan', ['bulan'=>$bulan, 'tahun'=>$tahun])}}" class="btn btn-action btn-print" target="_blank"><i class="fas fa-print"></i> Cetak Laporan</a>
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
                <th class="center" scope="col">Nama Karyawan</th>
                <th class="center" scope="col">Jabatan</th>
                <th class="center" scope="col">Gaji Pokok</th>
                <th class="center" scope="col">Tunjangan</th>
                <th class="center" scope="col">Uang Makan</th>
                <th class="center" scope="col">Lembur</th>
                <th class="center" scope="col">Insentif</th>
                <th class="center" scope="col">Potongan</th>
                <th class="center" scope="col">Gaji Bersih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              $i = 0;
              ?>
              @foreach($gaji as $g)
              <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
              @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
              <?php $insentif = $g->insentif; ?>
              @else
              <?php $insentif = 0; ?>
              @endif

              <?php
              $i++;
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
                <th class="center" scope="row">{{$i}}</th>
                <td class="left">{{$g->name}}</td>
                <td class="left">{{$g->jabatan}}</td>
                <td class="center">Rp {{number_format($g->gaji_pokok, 0)}}</td>
                <td class="center">Rp {{number_format($pendapatan->nm_tunjangan, 0)}}</td>
                <td class="center">Rp {{number_format(($pendapatan->nm_makan*$g->jml_hadir), 0)}}</td>
                <td class="center">Rp {{number_format(($pendapatan->nm_lembur*$g->jml_lembur), 0)}}</td>
                <td class="center">
                  <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
                  @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
                  <?php $insentif = $g->insentif; ?>
                  @else
                  <?php $insentif = 0; ?>
                  @endif

                  Rp {{number_format($insentif)}}
                </td>
                <td class="center">- Rp {{number_format(($g->jml_alfa*$potongan->nm_alfa)+($g->jml_izin*$potongan->nm_izin)+($g->jml_sakit*$potongan->nm_sakit) ,0)}}</td>
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