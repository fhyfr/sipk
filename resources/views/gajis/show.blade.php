@extends('layouts.global')

@section('title') Detail Gaji Karyawan @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('/gajis')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header row">
      <h2>Detail Gaji <em>{{$gaji->name}}</em></h2>
      <a href="{{url('karyawan/pdf')}}" target="_blank" class="btn btn-action btn-print"><i class="fas fa-print"></i> Cetak Slip Gaji</a>
    </div>
    <div class="slip-gaji">
      <div class="header">
        <h2 class="pb-2">Slip Gaji Karyawan</h2>
        <h2 class="brand-name">{{$perusahaan->nama_perusahaan}}</h2>
      </div>
      <div class="content-body">
        <div class="data-karyawan">
          <div class="left">
            <div class="label">
              <h3>No. Slip</h3>
              <h3>NIK</h3>
              <h3>Nama Karyawan</h3>
              <h3>Jabatan</h3>
            </div>
            <div class="value">
              <p>: <span>{{$slip}}-{{$gaji->tahun}}</span></p>
              <p>: <span>{{$gaji->nik}}</span></p>
              <p>: <span>{{$gaji->name}}</span></p>
              <p>: <span>{{$gaji->jabatan}}</span></p>
            </div>
          </div>
          <div class="right">
            <div class="label">
              <h3>Tanggal Cetak</h3>
              <h3>Bulan</h3>
              <h3>Tahun</h3>
            </div>
            <div class="value">
              <p>: <span>{{$tanggal}}</span></p>
              <p>: <span>{{$gaji->bulan}}</span></p>
              <p>: <span>{{$gaji->tahun}}</span></p>
            </div>
          </div>
        </div>
        <hr>
        <div class="detail-fee">
          <div class="pendapatan">
            <h3>Rincian Pendapatan</h3>
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Gaji Pokok</td>
                  <td>=</td>
                  <td>Rp {{number_format($gaji->gaji_pokok, 0)}}</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Tunjangan</td>
                  <td>=</td>
                  <td>Rp {{number_format($pendapatan->nm_tunjangan, 0)}}</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Uang Makan</td>
                  <td>=</td>
                  <td>Rp {{number_format(($pendapatan->nm_makan*$gaji->jml_hadir), 0)}}</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Uang Lembur</td>
                  <td>=</td>
                  <td>Rp {{number_format(($pendapatan->nm_lembur*$gaji->jml_lembur), 0)}}</td>
                </tr>
                <tr>

                  <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
                  <?php
                  if (($gaji->jml_alfa && $gaji->jml_sakit && $gaji->jml_izin) == 0) {
                    $insentif = $pendapatan->nm_makan * $gaji->jml_hadir;
                  } else {
                    $insentif = 0;
                  };
                  ?>
                  <th scope="row">5</th>
                  <td>Insentif</td>
                  <td>=</td>
                  <td>Rp
                    {{number_format($insentif)}}
                  </td>
                </tr>
                <tr style="font-weight: 800;">
                  <th scope="row">6</th>
                  <td>Total Pendapatan</td>
                  <td>=</td>
                  <td>Rp {{number_format(($gaji->gaji_pokok +
                    $pendapatan->nm_tunjangan +
                    ($pendapatan->nm_makan*$gaji->jml_hadir) +
                    ($gaji->jml_lembur*$pendapatan->nm_lembur) + $insentif
                    ), 0)}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="potongan">
            <h3>Rincian Potongan</h3>
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Alfa</td>
                  <td>=</td>
                  <td>- Rp {{number_format($gaji->jml_alfa*$potongan->nm_alfa)}}</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Izin</td>
                  <td>=</td>
                  <td>- Rp {{number_format($gaji->jml_izin*$potongan->nm_izin)}}</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Sakit</td>
                  <td>=</td>
                  <td>- Rp {{number_format($gaji->jml_sakit*$potongan->nm_sakit)}}</td>
                </tr>
                <tr style="font-weight: 800;">
                  <th scope="row">4</th>
                  <td>Total Potongan</td>
                  <td>=</td>
                  <td>- Rp {{number_format(($gaji->jml_alfa*$potongan->nm_alfa)+($gaji->jml_izin*$potongan->nm_izin)+($gaji->jml_sakit*$potongan->nm_sakit) ,0)}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="total-fee">
          <h3>Total yang dibayarkan <strong>Rp {{number_format
              (
              (
                ($gaji->gaji_pokok + 
                $pendapatan->nm_tunjangan + 
                ($pendapatan->nm_makan*$gaji->jml_hadir) +
                ($gaji->jml_lembur*$pendapatan->nm_lembur) + $insentif
              ) 
              - 
              (
                ($gaji->jml_alfa*$potongan->nm_alfa)+($gaji->jml_izin*$potongan->nm_izin)+($gaji->jml_sakit*$potongan->nm_sakit)
              )
              ), 0)
            }}</strong></h3>
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