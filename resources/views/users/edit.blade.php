@extends('layouts.global')

@section('title') Edit Data {{$user->name}} @endsection

@section('content')

<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <a href="{{url('users')}}">
      <h1><i class="fas fa-chevron-left"></i> Kembali</h1>
    </a>
  </div>
  <div class="data-content">
    <div class="content-header">
      <h2>Edit Data <strong>{{$user->name}}</strong></h2>
    </div>

    <form class="add-data" action="{{route('users.update', [$user->id])}}" method="POST">
      @csrf
      <div class="form-row">

        <!-- Input berupa hidden untuk mengganti method menjadi PUT -->
        <input type="hidden" value="PUT" name="_method">

        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="nomorPengguna" class="col-form-label px-0 align-self-end">Nama Lengkap <strong>*</strong></label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="namaPengguna" placeholder="masukkan nama lengkap" required>
          </div>
          <div class="form-group">
            <label for="emailPengguna" class="col-form-label px-0 align-self-end">Email <strong>*</strong></label>
            <input type="email" value="{{$user->email}}" name="email" class="form-control" id="emailPengguna" placeholder="masukkan email" required>
          </div>
          <div class="form-group">
            <label for="userName" class="col-form-label px-0 align-self-end">Username <strong>*</strong></label>
            <input type="text" value="{{$user->username}}" name="username" class="form-control" id="userName" required="true" placeholder="masukkan username" required>
          </div>

        </div>
        <div class="col-md-6 p-2">
          <div class="form-group">
            <label for="password" class="col-form-label px-0 align-self-end">Password <strong>*</strong></label>
            <input type="password" value="{{$user->password}}" name="password" class="form-control" id="nomorHandphone" placeholder="masukkan password pengguna" required>
          </div>
          <div class="form-group">
            <label for="userLevel" class="col-form-label px-0 align-self-end">User Level <strong>*</strong></label>
            <select style="font-size: 12px;" id="userLevel" class="form-control" name="roles">
              <option {{ ($user->roles == 'admin') ? 'selected' : '' }}>Admin</option>
              <option {{ ($user->roles == 'karyawan') ? 'selected' : '' }}>Karyawan</option>
            </select>
          </div>
          <div class="form-group form-group-button">
            <button class="btn btn-action btn-action-save" type="submit"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Content End -->
@endsection