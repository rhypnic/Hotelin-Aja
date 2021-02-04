<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Hotelin-aja</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="hotelin" href="/hotelin">home</a></li>
            @yield('sidebar-dashboard')
          </ul>
        </li>
        
        
        <li class="menu-header">Pages</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
          <ul class="dropdown-menu">
            
            <li><a href="auth-register.html">profiles</a></li>
            <li><a href="auth-register.html">Register new Account</a></li>
            
          </ul>
        </li>
        
        
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Tools</span></a>
          <ul class="dropdown-menu">
            <li><a href="utilities-contact.html">Contact</a></li>
            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
            @yield('sidebar-tools')
          </ul>
        </li>
        
      </ul>

      
  </aside>