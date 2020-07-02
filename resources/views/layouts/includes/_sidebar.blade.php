<!-- Sidebar Dekstop Start -->
<aside id="main-sidebar" class="main-sidebar">
  <section id="sidebar" class="sidebar">
    <ul id="sidebar-menu" class="sidebar-menu">
      <!-- Main Menu Sart -->
      <li class="sidebar-header">MENU UTAMA</li>
      <li><a class="sidebar-item {{ (request()->is('/home'))|| (request()->is('home')) || (request()->is('/')) ? 'active' : '' }}" href="{{url('/home')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

      <!-- Sidebar Menu Admin -->
      @if(auth()->user()->roles == 'admin')
      <!-- Data Karyawan -->
      <li><a class="sidebar-item {{ (request()->is('karyawans')) || (request()->is('karyawans/create')) || (request()->is('karyawans/{$user->id}/edit')) ? 'active' : '' }}" href="{{url('/karyawans')}}"><i class="fas fa-folder-open"></i> Karyawan</a></li>

      <!-- Data Pengguna -->
      <li><a class="sidebar-item {{ (request()->is('users')) || (request()->is('users/create')) || (request()->is('users/{$user->id}/edit')) ? 'active' : '' }}" href="{{url('/users')}}"><i class="fas fa-users" aria-hidden="true"></i> Data Pengguna</a></li>

      <!-- Data Absensi -->
      <li><a class="sidebar-item {{ (request()->is('absensis')) || (request()->is('absensis/create')) || (request()->is('absensis/{$absensis->id}/edit')) ? 'active' : '' }}" href="{{url('/absensis')}}"><i class="fas fa-user-clock"></i> Absensi</a></li>

      <!-- Data Gaji -->
      <li><a class="sidebar-item {{ (request()->is('gajis')) || (request()->is('gajis/create')) || (request()->is('gajis/{$gajis->id}/edit')) ? 'active' : '' }}" href="{{url('/gajis')}}"><i class="fas fa-wallet" aria-hidden="true"></i> Gajian</a></li>

      <!-- Data Laporan -->
      <li><a class="sidebar-item {{ (request()->is('laporans')) || (request()->is('laporans/create')) || (request()->is('laporans/{$laporans->id}/edit')) ? 'active' : '' }}" href="{{url('/laporans')}}"><i class="fas fa-chart-pie"></i> Laporan</a></li>
      <!-- Main Menu End -->

      <!-- Setting Menu Start -->
      <li class="sidebar-header">PENGATURAN</li>
      <li><a class="sidebar-item {{ (request()->is('perusahaans')) || (request()->is('perusahaans/create')) || (request()->is('perusahaans/{$perusahaans->id}/edit')) ? 'active' : '' }}" href="{{url('/perusahaans')}}"><i class="fas fa-cogs"></i> Aplikasi</a></li>
      <li><a class="sidebar-item {{ (request()->is('penggajians')) || (request()->is('penggajians/create')) || (request()->is('penggajians/{$penggajians->id}/edit')) ? 'active' : '' }}" href="{{url('/penggajians')}}"><i class="fas fa-funnel-dollar"></i> Penggajian</a></li>
      @endif
      <!-- Setting Menu End -->

      <!-- Sidebar Menu Karyawan -->
      @if(auth()->user()->roles == 'karyawan')
      <!-- Data Absensi -->
      <li><a class="sidebar-item {{ (request()->is('absensis')) || (request()->is('absensis/create')) || (request()->is('absensis/{$absensis->id}/edit')) ? 'active' : '' }}" href="{{url('/absensis')}}"><i class="fas fa-user-clock"></i> Absensi</a></li>

      <!-- Data Gaji -->
      <li><a class="sidebar-item {{ (request()->is('gajis')) || (request()->is('gajis/create')) || (request()->is('gajis/{$gajis->id}/edit')) ? 'active' : '' }}" href="{{url('/gajis')}}"><i class="fas fa-wallet" aria-hidden="true"></i> Gajian</a></li>

      @endif
    </ul>
  </section>
</aside>
<!-- Sidebar Dekstop End -->