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
              <span class="nav-profile-name">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                <h6 class="date mb-0">Today : {{ now()->format('M d') }}</h6>
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
      <!-- partial:partials/_sidebar.html -->
   
      @if ($schoolowner->isEmpty())
      <p>You have not   <a href="{{ route('complete') }}">completed </a>your account.</p>
      @else                  
        @include('owner.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="table-responsive pt-3">
                      <table class="table table-striped project-orders-table">
                          <thead>
                              <tr>
                                  <th>Teacher Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Class</th>
                                  <th>DOB</th>
                                  <th>Address</th>
                                  <th>Hire Date</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if ($schoolteachers->isEmpty())
                              <tr>
                                  <td colspan="8">
                                      <p>You have no teachers yet. <a href="{{ route('add') }}">Add Teacher</a></p>
                                  </td>
                              </tr>
                              @else
                              @foreach ($schoolteachers as $teacher)
                              <tr>
                                  <td>{{ $teacher->name }}</td>
                                  <td>{{ $teacher->email }}</td>
                                  <td>{{ $teacher->phone }}</td>
                                  <td>{{ $teacher->class }}</td>
                                  <td>{{ $teacher->dob ? \Carbon\Carbon::parse($teacher->dob)->format('d M Y') : 'N/A' }}</td>

                                  <td>{{ $teacher->address ?? 'N/A' }}</td>
                                  <td>{{ $teacher->hire_date ? \Carbon\Carbon::parse($teacher->hire_date)->format('d M Y') : 'N/A' }}</td>

                                  
                                  <td>
                                      <div class="d-flex align-items-center">
                                          <!-- Edit Button -->
                                          <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                                              Edit
                                              <i class="typcn typcn-edit btn-icon-append"></i>
                                          </a>
                                  
                                          <!-- Delete Button (with confirmation) -->
                                          <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger btn-sm btn-icon-text">
                                                  Delete
                                                  <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                              </button>
                                          </form>
                                      </div>
                                  </td>
                                  
                              </tr>
                              @endforeach
                              @endif
                          </tbody>
                          
                      </table>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('owner.footer')
       @endif
