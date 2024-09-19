     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-laugh-wink"></i>
             </div>
             <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
             <a class="nav-link" href="{{ route('home') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Home</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
             Secciones
         </div>
         <li class="nav-item">
             <a class="nav-link " href="{{ route('real') }}">
                 <i class="fas fa-money-check-alt"></i>
                 <span>Real</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link " href="{{ route('proyeccion') }}">
                 <i class="fas fa-percent"></i>
                 <span>Proyecci&oacute;n</span>
             </a>
         </li>
         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Otros
         </div>
         <li class="nav-item">
             <a class="nav-link " href="{{ route('reporte') }}">
                 <i class="fas fa-file-signature"></i>
                 <span>Reporte</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('usuarios') }}">
                 <i class="fas fa-fw fa-user"></i>
                 <span>Usuarios</span></a>
         </li>
         <hr class="sidebar-divider d-none d-md-block">

         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>

     </ul>