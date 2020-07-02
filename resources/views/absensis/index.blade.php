@extends("layouts.global")

@section("title") Data Kehadiran @endsection

@section("content")
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <h1>Data Kehadiran Pengguna</h1>
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
      <form action="{{route('absensis.index')}}">
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
      <div class="action">
        @if(auth()->user()->roles == 'admin')
        <a href="{{route('absensis.create')}}" class="btn btn-action btn-add"><i class="fas fa-plus-circle"></i> <span>Tambah Data</span></a>
        <a class="btn delete_all" data-url="{{ url('absensisDeleteAll') }}"> <i class="fas fa-trash-alt"></i></a>
        @endif
      </div>
    </div>

    <div class="table-responsive-md">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="center" scope="col">No</th>
            @if(auth()->user()->roles == 'admin')
            <th class="center" scope="col"><input type="checkbox" id="master"></th>
            <th class="center" scope="col"><i class="fas fa-pen-square"></i></th>
            @endif
            <th class="center" scope="col">Nama Karyawan</th>
            <th class="center" scope="col">Bulan</th>
            <th class="center" scope="col">Tahun</th>
            <th class="center" scope="col">Hadir</th>
            <th class="center" scope="col">Alfa</th>
            <th class="center" scope="col">Izin</th>
            <th class="center" scope="col">Sakit</th>
            <th class="center" scope="col">Lembur</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          $jml = count($absensi);
          ?>
          @foreach($absensi as $absen)
          <?php
          $i++;
          ?>
          <tr>
            <th class="center" scope="row">{{$i}}</th>
            @if(auth()->user()->roles == 'admin')
            <td class="center"><input type="checkbox" class="sub_chk" data-id="{{$absen->id}}"></a></td>
            <td class="center"><a href="{{route('absensis.edit', [$absen->id] )}}"><i class="fas fa-pen-square"></i></a></td>
            @endif
            <td class="center">{{$absen->name}}</td>
            <td class="center">{{$absen->bulan}}</td>
            <td class="center">{{$absen->tahun}}</td>
            <td class="center">{{$absen->jml_hadir}}</td>
            <td class="center">{{$absen->jml_alfa}}</td>
            <td class="center">{{$absen->jml_izin}}</td>
            <td class="center">{{$absen->jml_sakit}}</td>
            <td class="center">{{$absen->jml_lembur}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="content-footer">
      <p>Menampilkan <strong>{{$jml}}</strong> data</p>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{$absensi->appends(Request::all())->links()}}
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- Content End -->

<!-- Optional Javascript -->
<script src="{{asset('js/deleteAllAbsensi.js')}}"></script>
@endsection