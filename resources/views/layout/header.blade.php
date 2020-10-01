<div class="horizontal-menu">
  <nav class="navbar top-navbar">
    <div class="container">
      <div class="navbar-content">
        <a href="#" class="navbar-brand">
          Swip<span>CRM</span>
        </a>
        <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown nav-apps">
            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="grid"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="appsDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">Web Apps</p>
                <a href="javascript:;" class="text-muted">Edit</a>
              </div>
              <div class="dropdown-body">
                <div class="d-flex align-items-center apps">
                  <a href="{{ url('/apps/chat') }}"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                  <a href="{{ url('/apps/calendar') }}"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                  <a href="{{ url('/email/inbox') }}"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                  <a href="{{ url('/general/profile') }}"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                </div>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-messages">
            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="mail"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="messageDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">9 New Messages</p>
                <a href="javascript:;" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Leonardo Payne</p>
                      <p class="sub-text text-muted">2 min ago</p>
                    </div>	
                    <p class="sub-text text-muted">Project status</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Carl Henson</p>
                      <p class="sub-text text-muted">30 min ago</p>
                    </div>	
                    <p class="sub-text text-muted">Client meeting</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Jensen Combs</p>												
                      <p class="sub-text text-muted">1 hrs ago</p>
                    </div>	
                    <p class="sub-text text-muted">Project updates</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Amiah Burton</p>
                      <p class="sub-text text-muted">2 hrs ago</p>
                    </div>
                    <p class="sub-text text-muted">Project deadline</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Yaretzi Mayo</p>
                      <p class="sub-text text-muted">5 hr ago</p>
                    </div>
                    <p class="sub-text text-muted">New record</p>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-notifications">
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="bell"></i>
              <div class="indicator">
                <div class="circle"></div>
              </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                <a href="javascript:;" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="user-plus"></i>
                  </div>
                  <div class="content">
                    <p>New customer registered</p>
                    <p class="sub-text text-muted">2 sec ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="gift"></i>
                  </div>
                  <div class="content">
                    <p>New Order Recieved</p>
                    <p class="sub-text text-muted">30 min ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="alert-circle"></i>
                  </div>
                  <div class="content">
                    <p>Server Limit Reached!</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="layers"></i>
                  </div>
                  <div class="content">
                    <p>Apps are ready for update</p>
                    <p class="sub-text text-muted">5 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="download"></i>
                  </div>
                  <div class="content">
                    <p>Download completed</p>
                    <p class="sub-text text-muted">6 hrs ago</p>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-profile">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
            </a>
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="figure mb-3">
                  <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
                </div>
                <div class="info text-center">
                  <p class="name font-weight-bold mb-0">Amiah Burton</p>
                  <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                </div>
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav p-0 pt-3">
                  <li class="nav-item">
                    <a href="{{ url('/general/profile') }}" class="nav-link">
                      <i data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      <i data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      <i data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i>
                            <span>Log Out</span>
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
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home')}}">
            <i class="link-icon" data-feather="box"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('salesummary')}}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="menu-title">Sales History</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('allusers')}}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="menu-title">Cashier</span>
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="link-icon" data-feather="pie-chart"></i>
            <span class="menu-title">Products</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="category-heading">Products</li>
              <li class="nav-item"><a class="nav-link " href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Products</a></li>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>