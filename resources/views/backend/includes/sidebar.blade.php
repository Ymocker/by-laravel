  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/siteimg/admlogo.jpg" alt="Бел-Янтэх" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Бел-Янтэх</span>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="Admin">
        </div>
        <div class="info">
          <span style="color: #EAA;">Admin</span>
        </div>
      </div>

    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-sidebar flex-column" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library
          =====================================================-->
          <li class="nav-header"> </li>
          <li class="nav-header"><span><i class="nav-icon far fa-edit"></i></span> Редактирование</li>

            <li class="nav-item">
              <a href="/admin/catalog" class="nav-link {{ $menu==1 ? 'active' : '' }}"> {{-- 1 --}}
                <i class="nav-icon far fa-circle"></i>
                <p>
                  Продукция
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/new" class="nav-link {{ $menu==2 ? 'active' : '' }}"> {{-- 2 --}}
                <i class="nav-icon far fa-circle"></i>
                <p>
                  Добавить
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/box" class="nav-link {{ $menu==6 ? 'active' : '' }}"> {{-- 6 --}}
                <i class="nav-icon far fa-circle"></i>
                <p>
                  Гофротара
                </p>
              </a>
            </li>


            <li class="nav-header"><span><i class="nav-icon fas fa-cog"></i></span> Управление</li>

            <li class="nav-item">
              <a href="/admin" class="nav-link {{ $menu==3 ? 'active' : '' }}">  {{-- 3 --}}
                <i class="far fa-circle nav-icon"></i>
                <p>Статистика</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/settings" class="nav-link {{ $menu==4 ? 'active' : '' }}">  {{-- 4 --}}
                <i class="far fa-circle nav-icon"></i>
                <p>Настройки</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/security" class="nav-link {{ $menu==5 ? 'active' : '' }}">  {{-- 5 --}}
                <i class="far fa-circle nav-icon"></i>
                <p>Безопасность</p>
              </a>
            </li>

            <li class="nav-header"></li>

            <li class="nav-item">
              <a href="/admin/logout" class="nav-link">
                <i class="fas fa-door-open nav-icon"></i>
                <p>Выход</p>
              </a>
            </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>