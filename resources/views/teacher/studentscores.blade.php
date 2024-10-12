@include('teacher.header')

<body>
  <div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../../../assets/images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../../../assets/images/logo-mini.svg" alt="logo" />
          </a>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav me-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="../../../assets/images/faces/face5.jpg" alt="profile" />
              <span class="nav-profile-name">{{ Auth::user()->name }}</span>
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
    <!-- End of Navbar -->
    
    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      @include('teacher.sidebar')
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <h2>Subjects for {{ $student->name }}</h2>

                  @if(!empty($finalsubject))
                  <form action="{{ route('store.scores') }}" method="POST">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <table class="table table-striped project-orders-table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>1st Test (Max 10)</th>
                <th>2nd Test (Max 20)</th>
                <th>Exam (Max 70)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($finalsubject as $subject)
            <tr>
                <td>{{ $subject }}</td>
                <td>
                    <input type="number" name="first_test[{{ $subject }}]" class="form-control" placeholder="Enter 1st test score" max="10" required>
                </td>
                <td>
                    <input type="number" name="second_test[{{ $subject }}]" class="form-control" placeholder="Enter 2nd test score" max="20" required>
                </td>
                <td>
                    <input type="number" name="exam[{{ $subject }}]" class="form-control" placeholder="Enter exam score" max="70" required>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Submit Scores</button>
</form>

                  @else
                  <p>No subjects found for this student.</p>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
        @include('teacher.footer')
      </div>
    </div>
  </div>
</body>
