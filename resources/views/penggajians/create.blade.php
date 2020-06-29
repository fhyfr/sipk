@extends('layouts.global')

@section('title') Tambah Gaji Poko @endsection

@section('content')

<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('penggajians')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content add-gaji-pokok">
    <div class="content-header">
      <h2>Tambah Gaji Pokok Karyawan</h2>
    </div>

    <form class="add-data absensi" action="{{route('penggajians.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="jabatan" class="col-form-label px-0 align-self-end">Jabatan <strong>*</strong></label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="masukkan nama jabatan" required>
      </div>
      <div class="form-group">
        <label for="gajiPokok" class="col-form-label px-0 align-self-end">Gaji Pokok <strong>*</strong></label>
        <input type="text" class="form-control" id="gajiPokok" name="gaji_pokok" placeholder="masukkan gaji pokok" required>
      </div>
      <div class="form-group">
        <label for="insentif" class="col-form-label px-0 align-self-end">Insentif <strong>*</strong></label>
        <input type="text" class="form-control" id="insentif" name="insentif" placeholder="masukkan gaji insentif jabatan" required>
      </div>
      <div class="form-group form-group-button">
        <button class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- Content End -->

@endsection