@extends('layouts.global')

@section('title') Data Gaji Karyawan @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <h1>Data Gaji Karyawan</h1>
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
  </div>
  <div class="data-content">
    <div class="filter-data">
      <h2>Filter Pencarian</h2>
      <form action="{{route('gajis.index')}}">
        <div class="form-filter">
          <div class="form-group">
            <label for="namaKaryawan" class="col-form-label px-0 align-self-end">Nama Karyawan</label>
            <input type="text" class="form-control" id="namaKaryawan" placeholder="masukkan nama">
          </div>
          <div class="form-group">
            <label for="month" class="col-form-label px-0 align-self-end">Bulan</label>
            <select style="font-size: 12px;" id="month" name="bulan" class="form-control">
              <option {{ $bulan == 'Januari'   ? 'selected' : '' }}>Januari</option>
              <option {{ $bulan == 'Februari'   ? 'selected' : '' }}>Februari</option>
              <option {{ $bulan == 'Maret'   ? 'selected' : '' }}>Maret</option>
              <option {{ $bulan == 'April'   ? 'selected' : '' }}>April</option>
              <option {{ $bulan == 'Mei'   ? 'selected' : '' }}>Mei</option>
              <option {{ $bulan == 'Juni'   ? 'selected' : '' }}>Juni</option>
              <option {{ $bulan == 'Juli'   ? 'selected' : '' }}>Juli</option>
              <option {{ $bulan == 'Agustus'   ? 'selected' : '' }}>Agustus</option>
              <option {{ $bulan == 'September'   ? 'selected' : '' }}>September</option>
              <option {{ $bulan == 'Oktober'   ? 'selected' : '' }}>Oktober</option>
              <option {{ $bulan == 'November'   ? 'selected' : '' }}>November</option>
              <option {{ $bulan == 'Desember'   ? 'selected' : '' }}>Desember</option>
            </select>
          </div>
          <div class="form-group">
            <label for="year" class="col-form-label px-0 align-self-end">Tahun</label>
            <select style="font-size: 12px;" id="year" name="tahun" class="form-control">
              @for($i=2000; $i<2030 ; $i++) <option {{ $tahun == $i ? 'selected' : '' }}>{{$i}}</option>
                @endfor
            </select>
          </div>
          <div class="form-group d-flex justify-content-center align-items-center">
            <button class="btn btn-action btn-action-view-data"><i class="fas fa-search"></i> Tampilkan</button>
          </div>
        </div>
      </form>
    </div>
    <div class="content-header row">
      <div class="dropshow">
        <p>Tampilkan</p>
        <form action="" class="p-0 mx-2">
          <select style="font-size: 12px;" id="view-per-page" class="form-control">
            <option selected>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
          </select>
        </form>
        <p>Data</p>
      </div>
      <div class="action">
        <a href="" class="btn btn-action btn-add"><i class="fas fa-print"></i> Cetak Slip Gaji</a>
        <a href=""><i class="fas fa-trash-alt"></i></a>
      </div>
    </div>

    <div class="table-responsive-md">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="center" scope="col">No</th>
            <th class="center" scope="col"><input type="checkbox" aria-label="Checkbox for following text input"></th>
            <th class="center" scope="col"><i class="fas fa-pen-square"></i></th>
            <th class="center" scope="col">NIK</th>
            <th class="center" scope="col">Nama Karyawan</th>
            <th class="center" scope="col">Bulan</th>
            <th class="center" scope="col">Tahun</th>
            <th class="center" scope="col">Total Gaji</th>
            <th class="center" scope="col">Rincian</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          $jml = count($gaji);
          ?>
          @foreach($gaji as $g)
          <?php
          $i++;
          ?>
          <tr>

            <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
            <?php
            if (($g->jml_alfa && $g->jml_sakit && $g->jml_izin) == 0) {
              $insentif = $pendapatan->nm_makan * $g->jml_hadir;
            } else {
              $insentif = 0;
            };
            ?>

            <th class="center" scope="row">{{$i}}</th>
            <td class="center"><a href=""><input type="checkbox" aria-label="Checkbox for following text input"></a></td>
            <td class="center"><a href=""><i class="fas fa-pen-square"></i></a></td>
            <td class="center">{{$g->nik}}</td>
            <td class="center">{{$g->name}}</td>
            <td class="center">{{$g->bulan}}</td>
            <td class="center">{{$g->tahun}}</td>
            <td class="center">Rp{{number_format
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
            }}
            </td>
            <td class="center"><a href="{{route('gajis.show',[$g->id])}}"><i class="fas fa-eye"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="content-footer">
      <p>Menampilkan <strong>1</strong> sampai <strong>2</strong> dari <strong>2</strong> data</p>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- Content End -->
@endsection