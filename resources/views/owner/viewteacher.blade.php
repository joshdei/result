@include('owner.header')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"><img src="../../../assets/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav me-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="../../../assets/images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i> Settings
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="typcn typcn-eject text-primary"></i> Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
              <h6 class="date mb-0">Today: {{ now()->format('M d') }}</h6>
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      @include('owner.sidebar')

      <!-- Main Panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                  <thead>
  <tr>
    <th>ID</th>
    <th>Owner Name</th> <!-- New column for Owner Name -->
    <th>Class</th>
    <th>Teacher Name</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  @foreach ($classrooms as $classRoom)
    <tr>
      <td>{{ $classRoom->id }}</td>
      <td>{{ $classRoom->owner->name ?? 'N/A' }}</td> <!-- Display owner's name -->
      <td>{{ $classRoom->class }}</td>
      <td>{{ $classRoom->teacher->name ?? 'N/A' }}</td> <!-- Display teacher's name -->
      <td>{{ $classRoom->created_at }}</td>
      <td>{{ $classRoom->updated_at }}</td>
      <td>
        <a href="{{ route('classes.edit', $classRoom->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('classes.destroy', $classRoom->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
</tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        @include('owner.footer')
      </div>
    </div>
  </div>
</body>
