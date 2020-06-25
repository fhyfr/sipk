@extends("layouts.global")

@section("title") Users list @endsection

@section("content")


@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif

<div class="row">
  <div class="col-md-8">
    <form action="{{route('users.index')}}">
      <div class="row">
        <div class="col-md-6">
          <input value="{{Request::get('keyword')}}" name="keyword" class="form-control" type="text" placeholder="Masukan email untuk filter..." />
        </div>
        <div class="col-md-6">
          <input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}} value="ACTIVE" name="status" type="radio" class="form-control" id="active">
          <label for="active">Active</label>
          <input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}} value="INACTIVE" name="status" type="radio" class="form-control" id="inactive">
          <label for="inactive">Inactive</label>
          <input type="submit" value="Filter" class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{route('users.create')}}" class="btn btn-outline-primary">Tambah user</a>
  </div>
</div>
<br>

<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th><b>Name</b></th>
      <th><b>Username</b></th>
      <th><b>Email</b></th>
      <th><b>Avatar</b></th>
      <th><b>Status</b></th>
      <th><b>Action</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>
        @if($user->avatar)
        <img src="{{asset('storage/'.$user->avatar)}}" width="70px" class="rounded-circle" />
        @else
        N/A
        @endif
      </td>
      <td>
        @if($user->status == "ACTIVE")
        <span class="badge badge-success">
          {{$user->status}}
        </span>
        @else
        <span class="badge badge-danger">
          {{$user->status}}
        </span>
        @endif
      </td>
      <td>
        <a class="btn btn-info text-white btn-sm" href="{{route('users.show', [$user->id] )}}"><span class="fa fa-eye"></span></a>
        <a class="btn btn-success text-white btn-sm" href="{{route('users.edit', [$user->id] )}}"><span class="fa fa-pencil-square-o"></span></a>
        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" value="Delete" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
        </form>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

<tfoot>
  <tr>
    <td colspan=10>
      {{$users->appends(Request::all())->links()}}
    </td>
  </tr>
</tfoot>

@endsection