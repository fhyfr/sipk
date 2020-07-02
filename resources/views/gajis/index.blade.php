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
    <!-- Fitur Filter Start -->
    <div class="filter-data">
      <h2>Filter Pencarian</h2>
      <form action="{{route('gajis.index')}}">
        <div class="form-filter">
          <div class="form-group">
            <label for="namaKaryawan" class="col-form-label px-0 align-self-end">Nama Karyawan</label>
            <input type="text" class="form-control" id="namaKaryawan" name="keyword" value="{{Request::get('keyword')}}" placeholder="masukkan nama">
          </div>
          <div class="form-group">
            <label for="month" class="col-form-label px-0 align-self-end">Bulan</label>
            <select style="font-size: 12px;" id="month" name="bulan" class="form-control">
              @foreach($bulan as $bl)
              <option>{{$bl->bulan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="year" class="col-form-label px-0 align-self-end">Tahun</label>
            <select style="font-size: 12px;" id="year" name="tahun" class="form-control">
              @foreach($tahun as $th)
              <option>{{$th->tahun}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group d-flex justify-content-center align-items-center">
            <button class="btn btn-action btn-action-view-data"><i class="fas fa-search"></i> Tampilkan</button>
          </div>
        </div>
      </form>
    </div>
    <!-- Fitur Filter End -->
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
      @if(auth()->user()->roles == 'admin')
      <div class="action">
        <a href="{{url('/cetak/slip/all')}}" target="_blank" class="btn btn-action btn-add"><i class="fas fa-print"></i> Cetak Semua</a>
      </div>
      @endif
    </div>

    <div class="table-responsive-md">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="center" scope="col">No</th>
            @if(auth()->user()->roles == 'admin')
            <th class="center" scope="col"><i class="fas fa-pen-square"></i></th>
            @endif
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
            <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
            @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
            <?php $insentif = $g->insentif; ?>
            @else
            <?php $insentif = 0; ?>
            @endif

            <th class="center" scope="row">{{$i}}</th>
            @if(auth()->user()->roles == 'admin')
            <td class=" center"><a href="{{route('absensis.edit', [$g->id] )}}"><i class="fas fa-pen-square"></i></a></td>
            @endif
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
      <p>Menampilkan <strong>{{$jml}}</strong> data</p>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{$gaji->appends(Request::all())->links()}}
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- Content End -->
@endsection