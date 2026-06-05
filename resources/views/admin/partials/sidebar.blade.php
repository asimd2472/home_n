{{-- <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> --}}
<aside class="app-sidebar">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{url('/')}}" class="brand-link">
            <!--begin::Brand Image-->
            {{-- <img
              src="{{ Vite::asset('resources/images/dummy-logo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            /> --}}
            {{-- <span class="brand-text fw-light">Admin Panel</span> --}}
            <span class="fw-800 fs-3 text-dark"><span class="text-primary-color">P</span> ProtoCut</span>
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >

              <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('admin.category') }}"
                    class="nav-link {{ request()->routeIs('admin.category') ? 'active' : '' }}">
                    
                      <i class="bi bi-people-fill"></i>
                      <p>Category</p>
                  </a>
              </li>

              {{-- <li class="nav-item">
                  <a href="{{ route('admin.orders') }}"
                    class="nav-link {{ request()->routeIs('admin.orders') || request()->routeIs('admin.orders_details') ? 'active' : '' }}">
                      <i class="bi bi-bag"></i>
                      <p>Orders</p>
                  </a>
              </li> --}}

              {{-- <li class="nav-item">
                  <a href="{{ route('admin.payment_list') }}"
                    class="nav-link {{ request()->routeIs('admin.payment_list') ? 'active' : '' }}">
                    
                      <i class="bi bi-currency-rupee"></i>
                      <p>Payment list</p>
                  </a>
              </li> --}}

              {{-- <li class="nav-item">
                  <a href="{{ route('admin.setting') }}"
                    class="nav-link {{ request()->routeIs('admin.setting') ? 'active' : '' }}">
                      <i class="bi bi-gear"></i>
                      <p>Setting</p>
                  </a>
              </li> --}}
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>