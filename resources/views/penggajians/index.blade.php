@extends('layouts.global')

@section('title') Pengaturan Gaji Karyawan @endsection

@section('content')
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <h1>Pengaturan Gaji Karyawan</h1>
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
  </div>
  <div class="data-content set-payment">
    <div class="gaji-pokok">

      <div class="content-header row">
        <div class="dropshow">
          <h3>Golongan dan Gaji Pokok</h3>
        </div>
        <div class="action">
          <a href="{{route('penggajians.create')}}" class="btn btn-action btn-add"><i class="fas fa-plus-circle"></i> Tambah Data</a>
          <a class="btn delete_all" data-url="{{ url('penggajiansDeleteAll') }}"> <i class="fas fa-trash-alt"></i></a>
        </div>
      </div>

      <div class="table-responsive-md">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col"><input type="checkbox" id="master"></th>
              <th scope="col"><i class="fas fa-pen-square"></i></th>
              <th scope="col">Jabatan</th>
              <th scope="col">Gaji Pokok</th>
              <th scope="col">Insentif</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            $jml = count($jabatan);
            ?>
            @foreach($jabatan as $jb)
            <?php
            $i++;
            ?>
            <tr>
              <th class="center" scope="row">{{$i}}</th>
              <td class="center"></a><input type="checkbox" class="sub_chk" data-id="{{$jb->id}}"></td>
              <td class="center"><a href="{{route('penggajians.edit', [$jb->id] )}}"><i class="fas fa-pen-square"></i></a></td>
              <td class="center">{{$jb->jabatan}}</td>
              <td class="center">Rp {{number_format($jb->gaji_pokok, 0)}}</td>
              <td class="center">Rp {{number_format($jb->insentif, 0)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="content-footer">
        <p>Menampilkan <strong>{{$jml}}</strong> data</p>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            {{$jabatan->appends(Request::all())->links()}}
          </ul>
        </nav>
      </div>
    </div>

    <div class="plus-minus">
      <div class="pendapatan">
        @foreach($potongan as $pt)
        <h3>Pengurangan Gaji</h3>
        <form action="{{route('penggajians.update', [$pt->id])}}" method="post">
          @csrf
          <div class="form-group row">
            <!-- Input berupa hidden untuk mengganti method menjadi PUT -->
            <input type="hidden" value="PUT" name="_method">

            <label for="alfa" class="col-sm-3 col-form-label">Alfa</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="alfa" name="alfa" value="{{$pt->nm_alfa}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="izin" class="col-sm-3 col-form-label">Izin</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="izin" name="izin" value="{{$pt->nm_izin}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="sakit" class="col-sm-3 col-form-label">Sakit</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="sakit" name="sakit" value="{{$pt->nm_sakit}}" required>
            </div>
          </div>
          @endforeach
          <div class="form-group form-group-button">
            <button class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
      <div class="potongan">
        @foreach($pendapatan as $pd)
        <h3>Penambahan Gaji</h3>
        <form action="{{route('penggajians.update', [$pd->id])}}" method="post">
          @csrf
          <div class="form-group row">
            <!-- Input berupa hidden untuk mengganti method menjadi PUT -->
            <input type="hidden" value="PUT" name="_method">

            <label for="lembur" class="col-sm-3 col-form-label">Lembur</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="lembur" name="lembur" value="{{$pd->nm_lembur}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="uangMakan" class="col-sm-3 col-form-label">Uang Makan</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="uangMakan" name="makan" value="{{$pd->nm_makan}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tunjangan" class="col-sm-3 col-form-label">Tunjangan</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="tunjangan" name="tunjangan" value="{{$pd->nm_tunjangan}}" required>
            </div>
          </div>
          @endforeach
          <div class="form-group form-group-button">
            <button class="btn btn-action btn-action-save"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Content End -->

<script src="{{asset('js/deleteAllGolongan.js')}}"></script>
@endsection