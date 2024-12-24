<aside class="left-sidebar" style="background-color: #e3f2fd; width: 300px; height: 100vh; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); color: #1e88e5;">
    <div>
      <!-- Brand Logo -->
      <div class="brand-logo d-flex align-items-center justify-content-between px-3 py-4" style="background-color: #90caf9; color: #0d47a1;">
        <a href="#" class="text-nowrap logo-text d-flex align-items-center">
          <span style="font-size: 1.5rem; font-weight: bold; color: #0d47a1;">BE</span>
          <span style="font-size: 1.5rem; font-weight: bold; color: #ffffff; margin-left: 5px;">explore</span>
        </a>
        <button class="btn btn-link text-white d-xl-none d-block p-0" id="sidebarCollapse">
          <i class="ti ti-x fs-4"></i>
        </button>
      </div>

      <!-- Sidebar Navigation -->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar style="padding-top: 10px;">
        <ul id="sidebarnav" class="list-unstyled">
          <!-- Home Section -->
          <li class="nav-small-cap px-3 text-muted fw-bold mt-4 mb-2" style="background: linear-gradient(to right, #64b5f6, #42a5f5); padding: 8px 16px; border-radius: 12px; color: white; font-size: 1.1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;"
    onmouseover="this.style.background='linear-gradient(to right, #42a5f5, #64b5f6)'; this.style.cursor='pointer';"
    onmouseout="this.style.background='linear-gradient(to right, #64b5f6, #42a5f5)';">
  Home
</li>
          </li>

                    <li class="sidebar-item">
            <a class="sidebar-link d-flex align-items-center px-3 py-3" href="{{ route('dashboard.index') }}" style="color: #0d47a1; text-decoration: none; border-radius: 8px; transition: all 0.3s;">
              <i class="fas fa-home me-3" style="font-size: 1.2rem; color: #42a5f5;"></i>
              <span style="font-size: 1rem; font-weight: 600;">Dashboard</span>
            </a>
          </li>

          <!-- Pencarian Section -->
          <li class="sidebar-item">
            <a class="sidebar-link d-flex align-items-center px-3 py-3" href="{{ route('pencarian.index') }}" style="color: #0d47a1; text-decoration: none; border-radius: 8px; transition: all 0.3s;">
              <i class="fas fa-search me-3" style="font-size: 1.2rem; color: #29b6f6;"></i>
              <span style="font-size: 1rem; font-weight: 600;">Pencarian</span>
            </a>
          </li>

          <!-- Booking Section -->
          <li class="sidebar-item">
            <a class="sidebar-link d-flex align-items-center px-3 py-3" href="{{ route('booking.index') }}" style="color: #0d47a1; text-decoration: none; border-radius: 8px; transition: all 0.3s;">
              <i class="fas fa-calendar-alt me-3" style="font-size: 1.2rem; color: #4fc3f7;"></i>
              <span style="font-size: 1rem; font-weight: 600;">Booking</span>
            </a>
          </li>

          <!-- Auth Section -->
          <li class="nav-small-cap px-3 text-muted fw-bold mt-4 mb-2" style="background: linear-gradient(to right, #64b5f6, #42a5f5); padding: 8px 16px; border-radius: 12px; color: white; font-size: 1.1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;"
          onmouseover="this.style.background='linear-gradient(to right, #42a5f5, #64b5f6)'; this.style.cursor='pointer';"
          onmouseout="this.style.background='linear-gradient(to right, #64b5f6, #42a5f5)';">
        Auth
      </li>          <li class="sidebar-item">
            <a class="sidebar-link d-flex align-items-center px-3 py-3" href="{{ route('login') }}" style="color: #0d47a1; text-decoration: none; border-radius: 8px; transition: all 0.3s;">
              <i class="fas fa-sign-in-alt me-3" style="font-size: 1.2rem; color: #1e88e5;"></i>
              <span style="font-size: 1rem; font-weight: 600;">Login</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link d-flex align-items-center px-3 py-3" href="{{ route('register') }}" style="color: #0d47a1; text-decoration: none; border-radius: 8px; transition: all 0.3s;">
              <i class="fas fa-user-plus me-3" style="font-size: 1.2rem; color: #42a5f5;"></i>
              <span style="font-size: 1rem; font-weight: 600;">Register</span>
            </a>
          </li>
          <li class="sidebar-item">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="sidebar-link d-flex align-items-center px-3 py-3" style="background: none; border: none; color: #0d47a1; text-decoration: none; border-radius: 8px; cursor: pointer; transition: all 0.3s;">
                <i class="fas fa-sign-out-alt me-3" style="font-size: 1.2rem; color: #e57373;"></i>
                <span style="font-size: 1rem; font-weight: 600;">Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
