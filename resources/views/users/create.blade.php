@extends("layouts.global")

@section("title") Tambah Data Pengguna @endsection

@section("content")

<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('users')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header">
      <h2>Tambah Data Pengguna</h2>
    </div>

    <form class="add-data" action="{{route('users.store')}}" method="post">
      @csrf
      <div class="form-row">
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="nomorPengguna" class="col-form-label px-0 align-self-end">Nama Lengkap <strong>*</strong></label>
            <input type="text" name="name" class="form-control" id="namaPengguna" placeholder="masukkan nama lengkap" required autofocus>
          </div>
          <div class="form-group">
            <label for="emailPengguna" class="col-form-label px-0 align-self-end">Email <strong>*</strong></label>
            <input type="email" name="email" class="form-control" id="emailPengguna" placeholder="masukkan email" required>
          </div>
          <div class="form-group">
            <label for="userName" class="col-form-label px-0 align-self-end">Username <strong>*</strong></label>
            <input type="text" name="username" class="form-control" id="userName" placeholder="masukkan username" required>
          </div>
        </div>
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="password" class="col-form-label px-0 align-self-end">Password <strong>*</strong></label>
            <input type="password" name="password" class="form-control" id="nomorHandphone" placeholder="masukkan password pengguna" required>
          </div>
          <div class="form-group">
            <label for="userLevel" class="col-form-label px-0 align-self-end">User Level <strong>*</strong></label>
            <select style="font-size: 12px;" id="userLevel" name="roles" class="form-control">
              <option>Admin</option>
              <option>Karyawan</option>
            </select>
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
</div>

@endsection