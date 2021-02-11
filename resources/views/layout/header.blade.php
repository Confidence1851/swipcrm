@php
    $isAdmin = isAdmin();
@endphp
<div class="horizontal-menu">
  <nav class="navbar top-navbar">
    <div class="container">
      <div class="navbar-content">
        <a href="#" class="navbar-brand">
          Swip<span>CRM</span>
        </a>
        {{-- <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form> --}}
        <ul class="navbar-nav">
          <li class="nav-item dropdown nav-apps">
            {{-- <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="grid"></i>
            </a> --}}
            <div class="dropdown-menu" aria-labelledby="appsDropdown">
              {{-- <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">Web Apps</p>
                <a href="javascript:;" class="text-muted">Edit</a>
              </div> --}}
              <div class="dropdown-body">
                <div class="d-flex align-items-center apps">
                  {{-- <a href="{{ url('/apps/chat') }}"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                  <a href="{{ url('/apps/calendar') }}"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                  <a href="{{ url('/email/inbox') }}"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a> --}}
                  <a href="#"><p>{{ auth()->user()->name }}</p></a>
                </div>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
         
          <li class="nav-item dropdown nav-profile">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile"> --}}
              {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="info text-center">
                  <p class="name font-weight-bold mb-0">{{ auth()->user()->name }}</p>
                  <p class="email text-muted mb-3">{{ auth()->user()->username }}</p>
                </div>
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav p-0 pt-3">
                  @if($isAdmin)
                  <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#printer_setting_modal">
                      <i data-feather="user"></i>
                      <span>Printer Settings</span>
                    </a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color:#00bf8f;">
                            <i data-feather="log-out"></i>
                            <span >Log Out</span>
                    </a>
                  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
          <i data-feather="menu"></i>					
        </button>
      </div>
    </div>
  </nav>
  <nav class="bottom-navbar">
    <div class="container">
      <ul class="nav page-navigation">

        @if($isAdmin)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home')}}">
            <i class="link-icon" data-feather="box"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="{{ route('salesummary')}}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="menu-title">Sales History</span>
          </a>
        </li>
        @if($isAdmin)
        <li class="nav-item">
          <a href="{{ route('allusers')}}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="link-icon" data-feather="pie-chart"></i>
            <span class="menu-title">Products</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="category-heading">Products</li>
              @if($isAdmin)
              <li class="nav-item"><a class="nav-link " href="#" data-toggle="modal" data-target="#addProductModal" data-whatever="@mdo">Add Products</a></li>
             @endif
              <li class="nav-item"><a href="/products" class="nav-link">View All Products</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{ route('admincashier')}}" class="nav-link">
            <i class="link-icon" data-feather="repeat"></i>
            <span class="menu-title">Switch Mode</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>
@include('fragments.add_edit_products_modal')
@include("fragments.printer_setting_modal")
