<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon" />
  <link rel="shortcut icon"
    href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
    type="image/png" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <script src="assets/static/js/initTheme.js"></script>

  <div id="app">
    <div id="sidebar">
      <div class="sidebar-wrapper active">
        <!-- Sidebar Header -->
        <div class="sidebar-header position-relative">
          <div class="logo-wrapper">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="logo-img">
            <span class="logo-text">MINUGO ADMIN</span>
          </div>
          <div class="theme-toggle d-flex align-items-center justify-content-center mt-3">
            <i class="bi bi-sun-fill icon-sun me-2"></i>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input" type="checkbox" id="toggle-dark">
            </div>
            <i class="bi bi-moon-fill icon-moon ms-2"></i>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <!-- Dashboard -->
            <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
              <a href="/admin" class="sidebar-link">
                <i class="fa-solid fa-gauge"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <!-- Akun -->
            <li class="sidebar-item {{ request()->is('akun') ? 'active' : '' }}">
              <a href="/akun" class="sidebar-link">
                <i class="fa-solid fa-user-plus"></i>
                <span>Akun</span>
              </a>
            </li>

            <!-- Siswa with Submenu -->
            <li class="sidebar-item has-sub {{ request()->is('siswa/kelas-*') ? 'active' : '' }}">
              <a href="#" class="sidebar-link">
                <i class="fa-solid fa-users"></i>
                <span>Siswa</span>
              </a>
              <ul class="submenu {{ request()->is('siswa/kelas-*') ? 'submenu-open' : '' }}">
                <li class="submenu-item {{ request()->is('siswa/kelas-1') ? 'active' : '' }}">
                  <a href="/siswa/kelas-1" class="submenu-link">Kelas 1</a>
                </li>
                <li class="submenu-item {{ request()->is('siswa/kelas-2') ? 'active' : '' }}">
                  <a href="/siswa/kelas-2" class="submenu-link">Kelas 2</a>
                </li>
                <li class="submenu-item {{ request()->is('siswa/kelas-3') ? 'active' : '' }}">
                  <a href="/siswa/kelas-3" class="submenu-link">Kelas 3</a>
                </li>
                <li class="submenu-item {{ request()->is('siswa/kelas-4') ? 'active' : '' }}">
                  <a href="/siswa/kelas-4" class="submenu-link">Kelas 4</a>
                </li>
                <li class="submenu-item {{ request()->is('siswa/kelas-5') ? 'active' : '' }}">
                  <a href="/siswa/kelas-5" class="submenu-link">Kelas 5</a>
                </li>
                <li class="submenu-item {{ request()->is('siswa/kelas-6') ? 'active' : '' }}">
                  <a href="/siswa/kelas-6" class="submenu-link">Kelas 6</a>
                </li>
              </ul>
            </li>

            <!-- Guru -->
            <li class="sidebar-item {{ request()->is('guru') ? 'active' : '' }}">
              <a href="/guru" class="sidebar-link">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>Guru</span>
              </a>
            </li>

            <!-- Ekstrakurikuler -->
            <li class="sidebar-item {{ request()->is('ekstrakulikuler') ? 'active' : '' }}">
              <a href="/ekstrakulikuler" class="sidebar-link">
                <i class="fa-solid fa-futbol"></i>
                <span>Ekstrakurikuler</span>
              </a>
            </li>

            <!-- Sarpas -->
            <li class="sidebar-item {{ request()->is('sarpas') ? 'active' : '' }}">
              <a href="/sarpas" class="sidebar-link">
                <i class="fa-solid fa-building"></i>
                <span>Sarpas</span>
              </a>
            </li>

            <!-- Berita -->
            <li class="sidebar-item {{ request()->is('berita') ? 'active' : '' }}">
              <a href="/berita" class="sidebar-link">
                <i class="fa-solid fa-newspaper"></i>
                <span>Berita</span>
              </a>
            </li>

            <!-- Prestasi -->
            <li class="sidebar-item {{ request()->is('prestasi') ? 'active' : '' }}">
              <a href="/prestasi" class="sidebar-link">
                <i class="fa-solid fa-trophy"></i>
                <span>Prestasi</span>
              </a>
            </li>

            <!-- PPDB -->
            <li class="sidebar-item {{ request()->is('ppdb') ? 'active' : '' }}">
              <a href="/ppdb" class="sidebar-link">
                <i class="fa-solid fa-school"></i>
                <span>PPDB</span>
              </a>
            </li>

            <!-- Home with Submenu -->
            <li class="sidebar-item has-sub {{ request()->is('prestasi-home', 'berita-home') ? 'active' : '' }}">
              <a href="#" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Home</span>
              </a>
              <ul class="submenu {{ request()->is('prestasi-home', 'berita-home') ? 'submenu-open' : '' }}">
                <li class="submenu-item {{ request()->is('prestasi-home') ? 'active' : '' }}">
                  <a href="/prestasi-home" class="submenu-link">Prestasi Home</a>
                </li>
                <li class="submenu-item {{ request()->is('berita-home') ? 'active' : '' }}">
                  <a href="/berita-home" class="submenu-link">Berita Home</a>
                </li>
              </ul>
            </li>

            <!-- Logout -->
            <li class="sidebar-item">
              <a href="/logout" class="sidebar-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div id="main">
      <header class="mb-3"></header>
      @yield('content')
    </div>
  </div>

  <!-- Scripts -->
  <script src="assets/static/js/components/dark.js"></script>
  <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/compiled/js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="assets/static/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Theme Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('toggle-dark');
      const body = document.body;

      if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        toggle.checked = true;
      }

      toggle.addEventListener('change', function () {
        if (this.checked) {
          body.classList.add('dark');
          localStorage.setItem('theme', 'dark');
        } else {
          body.classList.remove('dark');
          localStorage.setItem('theme', 'light');
        }
      });
    });
  </script>
  <script>
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
    });

    document.addEventListener('keydown', function (e) {
      // Disable F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
      if (e.keyCode == 123 ||
        (e.ctrlKey && e.shiftKey && e.keyCode == 73) ||
        (e.ctrlKey && e.shiftKey && e.keyCode == 74) ||
        (e.ctrlKey && e.keyCode == 85)) {
        e.preventDefault();
      }
    });
  </script>
  <!-- Success Alert -->
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
      });
    </script>
  @endif

  <!-- Error Alert -->
  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ $errors->first() }}",
        confirmButtonText: 'OK'
      });
    </script>
  @endif

  @stack('scripts')
</body>

</html>