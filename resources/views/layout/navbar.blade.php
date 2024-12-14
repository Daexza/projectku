<!-- Header Start -->
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c3dae6;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <!-- Bagian Kiri: Teks dan Icon -->
      <div class="navbar-brand d-flex align-items-center">
        <i class="fa-solid fa-hotel me-2" style="color: #ffffff; font-size: 1.5rem;"></i>
        <h4 class="mb-0 text-white fw-bold">Find Accommodation to Stay</h4>
      </div>

      <!-- Bagian Kanan: Profil User -->
      <ul class="navbar-nav flex-row align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
             aria-expanded="false">
            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="User" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">My Profile</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-mail fs-6"></i>
                <p class="mb-0 fs-3">My Account</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-list-check fs-6"></i>
                <p class="mb-0 fs-3">My Task</p>
              </a>
              <a href="#" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Header End -->
