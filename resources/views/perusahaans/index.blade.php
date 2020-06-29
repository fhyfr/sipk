@extends("layouts.global")

@section("title") Pengaturan Umum Aplikasi @endsection

@section("content")
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <h1>Pengaturan Umum Aplikasi</h1>
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
  </div>
  <div class="data-content">
    <div class="content-header">
      <div class="action">
        <a href="{{route('perusahaans.edit', [$perusahaan[0]->id] )}}" data-id="$perusahaan[0]->id" class=" btn btn-action"><i class="fas fa-pen-square"></i> Edit Data</a>
      </div>
    </div>

    <div class="table-responsive-md">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Konten</th>
          </tr>
        </thead>
        <tbody>
          @foreach($perusahaan as $pr)
          <tr>
            <th class="center" scope="row">1</th>
            <td>Nama Perusahan</td>
            <td>{{$pr->nama_perusahaan}}</td>
          </tr>
          <tr>
            <th class="center" scope="row">2</th>
            <td>Nama Pimpinan</td>
            <td>{{$pr->nama_pimpinan}}</td>
          </tr>
          <tr>
            <th class="center" scope="row">3</th>
            <td>Alamat</td>
            <td>{{$pr->alamat}}</td>
          </tr>
          <tr>
            <th class="center" scope="row">4</th>
            <td>Telepon</td>
            <td>{{$pr->telepon}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Content End -->
@endsection