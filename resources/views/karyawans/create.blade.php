@extends ("layouts.global")

@section("title") Tambah Data Karyawan @endsection

@section("content")

<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('karyawans')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header">
      <h2>Tambah Data Karyawan</h2>
    </div>

    <form class="add-data" action="{{route('karyawans.store')}}" method="post">
      @csrf
      <div class="form-row">
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="nomorInduk" class="col-form-label px-0 align-self-end">NIK <strong>*</strong></label>
            <input type="number" class="form-control" id="nomorInduk" name="nik" placeholder="masukkan nomor induk karyawan" required autofocus>
          </div>
          <div class="form-group">
            <label for="namaLengkap" class="col-form-label px-0 align-self-end">Nama Karyawan <strong>*</strong></label>
            <input type="text" class="form-control" id="namaLengkap" name="name" placeholder="masukkan nama karyawan" required>
          </div>
          <div class="form-group">
            <!-- Akan Relatif Pada Data yang Ada di Pengturan Gaji: Jika Data Gaji Pokok Bertambah Maka Jabatan Akan Bertambah -->
            <label for="jabatan" class="col-form-label px-0 align-self-end">Jabatan <strong>*</strong></label>
            <select style="font-size: 12px;" id="jabatan" class="form-control" name="jabatan">
              @foreach($jabatan as $jb)
              <option>{{$jb->jabatan}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="jenisKelamin" class="col-form-label px-0 align-self-end">Jenis Kelamin <strong>*</strong></label>
            <select style="font-size: 12px;" id="jenisKelamin" class="form-control" name="jk">
              <option selected>Laki-laki</option>
              <option>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="agama" class="col-form-label px-0 align-self-end">Agama <strong>*</strong></label>
            <select style="font-size: 12px;" id="agama" name="agama" class="form-control">
              <option selected>Islam</option>
              <option>Kristen</option>
              <option>Katolik</option>
              <option>Budha</option>
              <option>Hindu</option>
              <option>Konghucu</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nomorHandphone" class="col-form-label px-0 align-self-end">Nomor Telepon <strong>*</strong></label>
            <input type="number" class="form-control" id="nomorHandphone" name="telepon" placeholder="masukkan nomor telepon" required>
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