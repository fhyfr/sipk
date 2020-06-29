 <!-- Main Header Start -->
 <header class="main-header fixed-top">
   <p id="open-sidebar-button"><i onclick="openSidebar()" class="fas fa-bars"></i></p>
   <p id="close-sidebar-button"><i onclick="closeSidebar()" class="fas fa-times"></i></p>
   <a class="logo-brand" href="">Sistem Penggajian</a>
   <nav class="navbar justify-content-end">
     <form action="{{route("logout")}}" method="POST">
       @csrf
       <button class="btn" style="cursor:pointer"><i class="fas fa-power-off"></i>Keluar</button>
     </form>
   </nav>
 </header>
 <!-- Main Header End -->