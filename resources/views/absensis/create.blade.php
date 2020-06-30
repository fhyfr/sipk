@extends("layouts.global")

@section("title") Tambah Data Kehadiran @endsection

@section("content")

<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('absensis')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header">
      <h2>Tambah Data Kehadiran</h2>
    </div>

    <form class="add-data absensi" action="{{route('absensis.store')}}" method="post">
      @csrf
      <div class="form-row">
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="namaKaryawan" class="col-form-label px-0 align-self-end">Nama Karyawan <strong>*</strong></label>
            <select style="font-size: 12px;" name="name" id="namaKaryawan" class="form-control">
              <option>==Pilih Nama Karyawan==</option>
              @foreach($karyawan as $nama)
              <option>{{$nama->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-row month-year">
            <div class="col">
              <label for="month" class="col-form-label px-0 align-self-end">Bulan <strong>*</strong></label>
              <select style="font-size: 12px;" id="month" name="bulan" class="form-control">
                <option selected>Januari</option>
                <option>Februari</option>
                <option>Maret</option>
                <option>April</option>
                <option>Mei</option>
                <option>Juni</option>
                <option>Juli</option>
                <option>Agustus</option>
                <option>September</option>
                <option>Oktober</option>
                <option>November</option>
                <option>Desember</option>
              </select>
            </div>
            <div class="col">
              <label for="year" class="col-form-label px-0 align-self-end">Tahun <strong>*</strong></label>
              <input type="number" id="year" name="tahun" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6 p-2 mt-2">
          <div class="form-row">
            <div class="col-3">
              <label for="hadir" class="col-form-label px-0 align-self-end">Hadir <strong>*</strong></label>
              <input type="number" id="hadir" name="hadir" class="form-control" required>
            </div>
            <div class="col-3">
              <label for="alfa" class="col-form-label px-0 align-self-end">Alfa <strong>*</strong></label>
              <input type="number" id="alfa" name="alfa" class="form-control" required>
            </div>
            <div class="col-3">
              <label for="izin" class="col-form-label px-0 align-self-end">Izin <strong>*</strong></label>
              <input type="number" id="izin" name="izin" class="form-control" required>
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="col-3">
              <label for="sakit" class="col-form-label px-0 align-self-end">Sakit <strong>*</strong></label>
              <input type="number" id="sakit" name="sakit" class="form-control" required>
            </div>
            <div class="col-3">
              <label for="lembur" class="col-form-label px-0 align-self-end">Lembur <strong>*</strong></label>
              <input type="number" id="lembur" name="lembur" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-group-button">
            <button class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Content End -->
@endsection