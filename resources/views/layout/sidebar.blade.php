<aside class="left-sidebar" style="background-color: #c3dae6;">
  <div>
    <!-- Brand Logo -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="#" class="text-nowrap logo-text">
        <span style="font-size: 1.5rem; font-weight: bold; color: #ffffff;">
          BE
        </span>
        <span style="font-size: 1.5rem; font-weight: bold; color: #6c5ce7;">
          explore
        </span>
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- Home Section -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <!-- Pencarian Section -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('pencarian.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-search"></i>
            </span>
            <span class="hide-menu">Pencarian</span>
          </a>
        </li>

        <!-- Booking Section -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('booking.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-calendar-event"></i>
            </span>
            <span class="hide-menu">Booking</span>
          </a>
        </li>

        <!-- Auth Section -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Auth</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
            <span>
              <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Login</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
            <span>
              <i class="ti ti-user-plus"></i>
            </span>
            <span class="hide-menu">Register</span>
          </a>
        </li>
        <li class="sidebar-item">
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="sidebar-link" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
              <span>
                <i class="ti ti-logout"></i>
              </span>
              <span class="hide-menu">Logout</span>
            </button>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>