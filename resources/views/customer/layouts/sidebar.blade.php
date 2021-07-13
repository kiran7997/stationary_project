<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('customer-dashboard')}}">
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
      <li class=" nav-item @if(Request::is('customer-dashboard')) active @endif"><a
          class="d-flex align-items-center active" href="{{ url('customer-dashboard')}}"><i
            data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Welcome To MSB</span><span
            class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
      </li>
      <li class=" nav-item @if(Request::is('checkout')) active @endif "><a class=" d-flex
        align-items-center" href="{{url('/checkout')}}"><i data-feather='shopping-cart'></i><span
            class="menu-title text-truncate" data-i18n="Form Layout">Cart</span></a>
      </li>
      <li class=" nav-item @if(Request::is('my-order')) active @endif "><a class=" d-flex
        align-items-center" href="{{url('/my-order')}}"><i data-feather='shopping-bag'></i></i><span
            class="menu-title text-truncate" data-i18n="Form Layout">My Order</span></a>
      </li>
      <li class=" nav-item @if(Request::is('return-order-list')) active @endif "><a class=" d-flex
        align-items-center" href="{{url('/return-order-list')}}"><i data-feather='truck'></i><span
            class="menu-title text-truncate" data-i18n="Form Layout">Return Order</span></a>
      </li>
      <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">Reports</span></a>
        <ul class="menu-content">
          <li><a class="d-flex align-items-center" href="{{url('order-history')}}"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="List">Order History</span></a>
          </li>
          {{-- <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i data-feather="circle"></i><span
                class="menu-item text-truncate" data-i18n="Preview">District Wise Order</span></a>
          </li> --}}
        </ul>
      </li> -->
    </ul>
  </div>
</div>
<!-- END: Main Menu-->