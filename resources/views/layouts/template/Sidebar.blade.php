   <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
       <ul id="sidebarnav">
           <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">Home</span>
           </li>
           <li class="sidebar-item">
               <a class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}"
                   aria-expanded="false">
                   <span>
                       <i class="ti ti-layout-dashboard"></i>
                   </span>
                   <span class="hide-menu">Dashboard</span>
               </a>
           </li>
           <li class="sidebar-item">
               <a class="sidebar-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('profil') }}"
                   aria-expanded="false">
                   <span>
                       <i class="ti ti-layout-dashboard"></i>
                   </span>
                   <span class="hide-menu">Profil</span>
               </a>
           </li>
       </ul>
   </nav>
