<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto"><a class="navbar-brand"
          href="{{ asset('html/ltr/vertical-menu-template-semi-dark/index.html') }}">
          <img src="{{ url('/logo/msb.png') }}" height="55" style="margin-top:-18px;margin-left:-5px">
          <h2 class="brand-text">MSB</h2>
        </a></li>
      <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
            data-ticon="disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item @if(Request::is('home')) active @endif"><a class="d-flex align-items-center active"
          href="{{ url('/home') }}"><i data-feather="home"></i><span class="menu-title text-truncate"
            data-i18n="Dashboards">Dashboards</span><span
            class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
      </li>
      <li
        class=" nav-item @if(Request::is('roles') || Request::is('catagories') || Request::is('units') || Request::is('product_variation') || Request::is('product') || Request::is('inventories') || Request::is('stock'))  active @endif">
        <a class="d-flex align-items-center" href="#"><i data-feather="grid"></i><span class="menu-title text-truncate"
            data-i18n="Invoice">Master</span></a>
        <ul class="menu-content">
          <li><a class="d-flex align-items-center" href="{{route('roles.index')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="List">Department</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/catagories')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Preview">Category</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/units')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Edit">Unit</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/product_variation')}}"><i
                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Product
                Variation</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/product')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Add">Product</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/inventories')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Add">Inventory</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/stock')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Add">Stock</span></a>
          </li>
        </ul>
      </li>


      <li class=" nav-item @if(Request::is('users') || Request::is('customer')) active @endif"><a
          class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate"
            data-i18n="User">User</span></a>
        <ul class="menu-content">
          <li><a class="d-flex align-items-center" href="{{route('users.index')}}"><svg
                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-circle">
                <circle cx="12" cy="12" r="10"></circle>
              </svg><span class="menu-item text-truncate" data-i18n="List">Employee</span></a>
          </li>
          <li><a class="d-flex align-items-center" href="{{url('/customer')}}"><svg xmlns="http://www.w3.org/2000/svg"
                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                <circle cx="12" cy="12" r="10"></circle>
              </svg><span class="menu-item text-truncate" data-i18n="View">Customer</span></a>
          </li>
        </ul>
      </li>

      <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Reports</span><i
          data-feather="more-horizontal"></i>
      </li>
      <li class=" nav-item"><a class="d-flex align-items-center" href="form-layout.html"><i data-feather="box"></i><span
            class="menu-title text-truncate" data-i18n="Form Layout">Distinct Wise Order</span></a>
      </li>
      <li class=" nav-item"><a class="d-flex align-items-center" href="form-wizard.html"><i
            data-feather="package"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Sales Person Wise
            Order</span></a>
      </li>
    </ul>
  </div>
</div>
<!-- END: Main Menu-->