@extends("layouts.global")

@section("title") Laporan Keuangan @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard laporan">
  <div class="heading">
    <h1>Laporan Keuangan Gaji Karyawan</h1>
  </div>
  <div class="data-content content-header">
    <div class="filter-data">
      <h2>Cari Laporan</h2>
      <form action="{{route('laporans.index')}}">
        <div class="form-filter">
          <div class="form-group">
            <label for="month" class="col-form-label px-0 align-self-end">Bulan</label>
            <select style="font-size: 12px;" id="month" name="bulan" class="form-control">
              @foreach($bln as $b)
              <option>{{$b->bulan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="year" class="col-form-label px-0 align-self-end">Tahun</label>
            <select style="font-size: 12px;" id="year" name="tahun" class="form-control">
              @foreach($th as $t)
              <option>{{$t->tahun}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group d-flex justify-content-center align-items-center">
            <button class="btn btn-action btn-action-view-data"><i class="fas fa-search"></i> Tampilkan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Content End -->
@endsection