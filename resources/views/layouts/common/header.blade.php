<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
              data-feather="menu"></i></a></li>
      </ul>
    </div>
    <ul class="nav navbar-nav align-items-center ml-auto">
      <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
            data-feather="moon"></i></a></li>
      <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
            data-feather="search"></i></a>
        <div class="search-input">
          <div class="search-input-icon"><i data-feather="search"></i></div>
          <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
            data-search="search">
          <div class="search-input-close"><i data-feather="x"></i></div>
          <ul class="search-list search-list-main"></ul>
        </div>
      </li>
      <li class="nav-item dropdown dropdown-cart mr-25"><a class="nav-link" href="javascript:void(0);"
          data-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span
            class="badge badge-pill badge-primary badge-up cart-item-count">0</span></a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 mr-auto">My Cart</h4>
              <div class="badge badge-pill badge-light-primary">4 Items</div>
            </div>
          </li>
          <li class="dropdown-menu-footer">
            <div class="d-flex justify-content-between mb-1">
              <h6 class="font-weight-bolder mb-0">Total:</h6>
              <h6 class="text-primary font-weight-bolder mb-0">$0.00</h6>
            </div><a class="btn btn-primary btn-block" href="app-ecommerce-checkout.html">Checkout</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);"
          data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
            class="badge badge-pill badge-danger badge-up">0</span></a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
              <div class="badge badge-pill badge-light-primary">0 New</div>
            </div>
          </li>
          <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read all
              notifications</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
          id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <div class="user-nav d-sm-flex d-none"><span
              class="user-name font-weight-bolder login-user-name">{{ ucwords(Auth::user()->firstname) }}</span><span
              class="user-status">
              @if(!empty(Auth::user()->getRoleNames()))
              @foreach(Auth::user()->getRoleNames() as $v)
              {{ $v }}
              @endforeach
              @endif</p>
            </span></div><span class="avatar">
            @if(Auth::user()->profile_image!='')
            <img class="round" src="{{ url("user_images/".Auth::user()->profile_image) }}" alt="avatar" height="40"
              width="40">
            @else
            <img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar"
              height="40" width="40">
            @endif


            <span class="avatar-status-online"></span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item"
            href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a><a class="dropdown-item"
            href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item"
            href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a><a class="dropdown-item"
            href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a>
          <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings.html"><i
              class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item"
            href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing</a><a
            class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a><a
            class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="mr-50" data-feather="power"></i> Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Files</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
      href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{ asset('app-assets/images/icons/xls.png') }}" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
            Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
      href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{ asset('app-assets/images/icons/jpg.png') }}" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
      href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{ asset('app-assets/images/icons/pdf.png') }}" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing
            Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
      href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{ asset('app-assets/images/icons/doc.png') }}" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
    </a></li>
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Members</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
      href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{ asset('p-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png"
            height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
      href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png"
            height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
      href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png"
            height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
      href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png"
            height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
        </div>
      </div>
    </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between"><a
      class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results
          found.</span></div>
    </a></li>
</ul>
<!-- END: Header-->