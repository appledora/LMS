    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Librarian Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


  {{--    <!--Dashboard-->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>--}}

      <!--Lend & Return Books-->

      <!-- Book Management -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Book Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/addBook') }}">Add Books</a>
            <a class="collapse-item" href="{{ url('/manageBook') }}">Manage Books</a>
            <a class="collapse-item" href="{{ url('/categories') }}">Categories</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list"></i>
          <span>Request Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/manageRequest') }}">Pending Requests</a>
            <a class="collapse-item" href="{{ url('/manageBooks/trackReturn') }}">Track Lended Books</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="employee_home"  >
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>

   {{--   <!-- Member Management -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user"></i>
          <span>Members Management</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-color.html">Add New Member</a>
            <a class="collapse-item" href="utilities-border.html">Delete Member</a>
            <a class="collapse-item" href="utilities-border.html">Update Member</a>
            <a class="collapse-item" href="utilities-animation.html">Search Member</a>
          </div>
        </div>
      </li>--}}

   {{--   <!--Profile Management-->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Profile Management</span></a>
      </li>

      <!--Reserved Books-->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Reserved Books</span></a>
      </li>--}}

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->