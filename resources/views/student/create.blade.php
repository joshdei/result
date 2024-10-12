@include('teacher.header')
<body>
  <div class="container-scroller">
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

    <div class="container-fluid page-body-wrapper">      
      @include('teacher.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Student</h4>
                  <p class="card-description">Fill in the details of the student</p>
                  <form class="forms-sample" action="{{ route('student.store') }}" method="POST">
    @csrf <!-- CSRF protection -->
    
    <div class="form-group">
        <label for="studentName">Name</label>
        <input type="text" class="form-control" id="studentName" name="name" placeholder="Enter Student's Name" required>
    </div>
    
    <div class="form-group">
        <label for="studentClass">Class</label>
        <select name="class" id="class" class="form-control" required>
            <option value="{{ $teacherclass }}">{{ $teacherclass }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="arm">Select Arm</label>
        <select name="arm" id="arm" class="form-control" required>
            <option value="">Select Arm</option>
            @foreach ($classArms as $arm)
                <option value="{{ $arm }}">{{ $arm }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="studentGender">Gender</label>
        <select class="form-select" id="studentGender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button type="reset" class="btn btn-light">Cancel</button>
</form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('teacher.footer')
