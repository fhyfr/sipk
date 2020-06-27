 <!-- Main Header Start -->
 <header class="main-header">
   <a class="logo-brand" href="">PT. Gajian</a>
   <nav class="navbar justify-content-end fixed-top">
     <form action="{{route("logout")}}" method="POST">
       @csrf
       <button class="btn" style="cursor:pointer"><i class="fas fa-power-off"></i>Keluar</button>
     </form>
   </nav>
 </header>
 <!-- Main Header End -->