@extends('layouts.global')

@section('title') Dashboard @endsection

@section('content')

<!-- Content Strt -->
<div class="content-wrapper home">
    <h1>Selamat Datang, {{Auth::user()->name}}</h1>
    <h2>di Sistem Penggajian Karyawan PT. Gajian</h2>
</div>
<!-- Content End -->

@endsection