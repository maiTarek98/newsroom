  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/admin/dashboard')}}" class="app-brand-link">
              <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{url('/admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{url('/admin/settings')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Setting</div>
              </a>
            </li>            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Manage Pages</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Account Settings">Categoys</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('/admin/categorys/create')}}" class="menu-link">
                    <div data-i18n="Account">Create</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('/admin/categorys')}}" class="menu-link">
                    <div data-i18n="Notifications">Show</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Authentications">Blogs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('admin/blogs/create')}}" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Create</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/blogs')}}" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Show</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="{{url('admin/logout')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>  
            
        
           
          </ul>
        </aside>
        <!-- / Menu -->
      
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
