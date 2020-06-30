@extends('layouts.global')

@section('title') Edit Data {{$karyawan->name}} @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('karyawans')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header">
      <h2>Edit Data <strong>{{$karyawan->name}}</strong></h2>
    </div>

    <form class="add-data" action="{{route('karyawans.update', [$karyawan->id])}}" method="post">
      @csrf
      <div class="form-row">

        <!-- Input berupa hidden untuk mengganti method menjadi PUT -->
        <input type="hidden" value="PUT" name="_method">

        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="nomorInduk" class="col-form-label px-0 align-self-end">NIK <strong>*</strong></label>
            <input type="number" class="form-control" id="nomorInduk" name="nik" value="{{$karyawan->nik}}" placeholder="masukkan nomor induk karyawan">
          </div>
          <div class="form-group">
            <label for="namaLengkap" class="col-form-label px-0 align-self-end">Nama Karyawan <strong>*</strong></label>
            <input type="text" class="form-control" id="namaLengkap" name="name" value="{{$karyawan->name}}" placeholder=" masukkan nama karyawan" required>
          </div>
          <div class="form-group">
            <!-- Akan Relatif Pada Data yang Ada di Pengturan Gaji: Jika Data Gaji Pokok Bertambah Maka Jabatan Akan Bertambah -->
            <label for="jabatan" class="col-form-label px-0 align-self-end">Jabatan <strong>*</strong></label>
            <select style="font-size: 12px;" id="jabatan" class="form-control" name="jabatan">
              @foreach($jabatan as $jb)
              <option {{ ($karyawan->jabatan == $jb->jabatan)  ? 'selected' : '' }}>{{$jb->jabatan}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="jenisKelamin" class="col-form-label px-0 align-self-end">Jenis Kelamin <strong>*</strong></label>
            <select style="font-size: 12px;" id="jenisKelamin" class="form-control" name="jk">
              <option {{ ($karyawan->jk == 'Laki-laki')  ? 'selected' : '' }}>Laki-laki</option>
              <option {{ ($karyawan->jk == 'Perempuan')  ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="agama" class="col-form-label px-0 align-self-end">Agama <strong>*</strong></label>
            <select style="font-size: 12px;" id="agama" name="agama" class="form-control">
              <option {{ ($karyawan->agama == 'Islam')  ? 'selected' : '' }}>Islam</option>
              <option {{ ($karyawan->agama == 'Kristen')  ? 'selected' : '' }}>Kristen</option>
              <option {{ ($karyawan->agama == 'Katolik')  ? 'selected' : '' }}>Katolik</option>
              <option {{ ($karyawan->agama == 'Budha')  ? 'selected' : '' }}>Budha</option>
              <option {{ ($karyawan->agama == 'Hindu')  ? 'selected' : '' }}>Hindu</option>
              <option {{ ($karyawan->agama == 'Konghucu')  ? 'selected' : '' }}>Konghucu</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nomorHandphone" class="col-form-label px-0 align-self-end">Nomor Telepon <strong>*</strong></label>
            <input type="number" class="form-control" id="nomorHandphone" name="telepon" value="{{$karyawan->telepon}}" placeholder="masukkan nomor telepon" required>
          </div>
          <div class="form-group form-group-button">
            <button type="submit" class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Content End -->
@endsection