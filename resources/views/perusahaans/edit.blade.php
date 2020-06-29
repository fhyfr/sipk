@extends('layouts.global')

@section('title') Edit Pengaturan Umum @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('perusahaans')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content add-gaji-pokok">
    <div class="content-header">
      <h2>Edit Pengaturan Umum Aplikasi</h2>
    </div>

    <form class="add-data absensi" action="{{route('perusahaans.update', [$perusahaan->id])}}" method="POST">
      @csrf
      <!-- Input berupa hidden untuk mengganti method menjadi PUT -->
      <input type="hidden" value="PUT" name="_method">

      <div class="form-group">
        <label for="companyName" class="col-form-label px-0 align-self-end">Nama Perusahaan <strong>*</strong></label>
        <input type="text" class="form-control" id="companyName" name="nama_perusahaan" value="{{$perusahaan->nama_perusahaan}}" placeholder="masukkan nama perusahaan" required>
      </div>
      <div class="form-group">
        <label for="headOffice" class="col-form-label px-0 align-self-end">Nama Pimpinan <strong>*</strong></label>
        <input type="text" class="form-control" id="headOffice" name="nama_pimpinan" value="{{$perusahaan->nama_pimpinan}}" placeholder="masukkan nama pimpinan" required>
      </div>
      <div class="form-group">
        <label for="address" class="col-form-label px-0 align-self-end">Alamat <strong>*</strong></label>
        <input type="text" class="form-control" id="address" name="alamat" value="{{$perusahaan->alamat}}" placeholder="masukkan alamat" required>
      </div>
      <div class="form-group">
        <label for="phone" class="col-form-label px-0 align-self-end">Telepon <strong>*</strong></label>
        <input type="number" class="form-control" id="phone" name="telepon" value="{{$perusahaan->telepon}}" placeholder="masukkan nomor telephone" required>
      </div>
      <div class="form-group form-group-button">
        <button class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- Content End -->
@endsection