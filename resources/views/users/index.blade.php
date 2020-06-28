@extends("layouts.global")

@section("title") Data Pengguna @endsection

@section("content")
<!-- Content Start -->
<div class="content-wrapper non-dashboard">
  <div class="heading">
    <h1>Semua Pengguna</h1>
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif

    <div class="action">
      <a href="{{route('users.create')}}" class="btn btn-action"><i class="fas fa-plus-circle"></i> Tambah Data</a>
      <a class="btn delete_all" data-url="{{ url('usersDeleteAll') }}"> <i class="fas fa-trash-alt"></i></a>
    </div>
  </div>
  <div class="data-content">
    <div class="content-header">
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
      <div class="search">
        <form action="{{route('users.index')}}">
          <div class="form-group row">
            <div class="col-8">
              <input type="text" name="keyword" class="form-control" id="searchData" placeholder="masukkan kata kunci">
            </div>
            <input type="submit" value="Cari" class="btn btn-primary col-3 col-form-label px-0 align-self-end">
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive-md">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col"><input type="checkbox" id="master"></th>
            <th scope="col"><i class="fas fa-pen-square"></i></th>
            <th scope="col">Nama Pengguna</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">User Level</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          $jml = count($users);
          ?>
          @foreach($users as $user)
          <?php
          $i++;
          ?>
          <tr>
            <th class="center" scope="row">{{$i}}</th>
            <td class="center"></a><input type="checkbox" class="sub_chk" data-id="{{$user->id}}"></td>
            <td class=" center"><a href="{{route('users.edit', [$user->id] )}}"><i class="fas fa-pen-square"></i></a></td>
            <td class="center">{{$user->name}}</td>
            <td class="center">{{$user->email}}</td>
            <td class="center">{{$user->username}}</td>
            <td class="center">{{$user->roles}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="content-footer">
      <p>Menampilkan <strong>{{$jml}}</strong> data</p>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{$users->appends(Request::all())->links()}}
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- Content End -->

<!-- Optional Javascript -->
<script src="{{asset('js/deleteAllUsers.js')}}"></script>

@endsection