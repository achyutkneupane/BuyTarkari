<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{ asset('/') }}" class="text-center brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    
    <div class="sidebar">
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('adminDashboard') }}" class="nav-link {{ request()->routeIs('adminDashboard') ? "active" : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('adminBrands') }}" class="nav-link {{ request()->routeIs('adminBrands') ? "active" : '' }}">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Brands
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('adminCategories') }}" class="nav-link {{ request()->routeIs('adminCategories') ? "active" : '' }}">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('adminPaymentMethods') }}" class="nav-link {{ request()->routeIs('adminPaymentMethods') ? "active" : '' }}">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Payment Methods
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('adminAddProduct') || request()->routeIs('adminProducts') ? "menu-open" : '' }}">
            <a href="" class="nav-link {{ request()->routeIs('adminAddProduct') || request()->routeIs('adminProducts') ? "active" : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('adminAddProduct') }}" class="nav-link {{ request()->routeIs('adminAddProduct') ? "active" : '' }}">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('adminProducts') }}" class="nav-link {{ request()->routeIs('adminProducts') ? "active" : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->routeIs('adminAddPromocode') || request()->routeIs('adminPromocodes') ? "menu-open" : '' }}">
            <a href="" class="nav-link {{ request()->routeIs('adminAddPromocode') || request()->routeIs('adminPromocodes') ? "active" : '' }}">
              <i class="nav-icon fas fa-hand-holding-heart"></i>
              <p>
                Promocodes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('adminAddPromocode') }}" class="nav-link {{ request()->routeIs('adminAddPromocode') ? "active" : '' }}">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('adminPromocodes') }}" class="nav-link {{ request()->routeIs('adminPromocodes') ? "active" : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    
  </aside>



  {{-- For dropdown sidebar --}}
  {{-- <li class="nav-item menu-open">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Home
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Active Page</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Inactive Page</p>
        </a>
      </li>
    </ul>
  </li> --}}