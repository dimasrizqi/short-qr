<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=" / ">Miner Kolaborasi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">MK</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="/home " class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="">General Dashboard</a></li>
                </ul>
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill"></i> 
                  <span>Mining</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Data Dasar</a></li> 
                    <li><a class="nav-link" href="">Transaksi</a></li> 
                    @if ($message = Session::get('grupnya') == '2')
                    <li><a class="nav-link" href="">Mining Payout</a></li> 
                     @endif
                </ul>
              </li>
              @if ($message = Session::get('grupnya') == '2')
              <li class="menu-header">User</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('lihat-user')}}">Lihat User</a></li>
                  
                  <li><a href=" {{route('tambah-user')}} ">Tambah User</a></li>
                 
                </ul>
              </li>
              @endif
             
        </aside>
      </div>