@include('owner.header')

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../../../assets/images/logo.svg" alt="logo"/>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../../../assets/images/logo-mini.svg" alt="logo"/>
          </a>
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
      <!-- partial:partials/_sidebar.html -->
      @include('owner.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Result Marks</h4>
                  <p class="card-description">Fill in the details for result marks</p>
                  <form class="forms-sample" action="{{ route('marks.store') }}" method="POST">
                    @csrf <!-- CSRF protection -->

                    <div class="form-group">
                      <label for="firstTestMark">First Test Mark</label>
                      <input type="text" class="form-control" id="firstTestMark" name="first_test_mark" placeholder="Enter First Test Mark" required>
                    </div>

                    <div class="form-group">
                      <label for="secondTestMark">Second Test Mark</label>
                      <input type="text" class="form-control" id="secondTestMark" name="second_test_mark" placeholder="Enter Second Test Mark" required>
                    </div>

                    <div class="form-group">
                      <label for="examMark">Exam Mark</label>
                      <input type="text" class="form-control" id="examMark" name="exam_mark" placeholder="Enter Exam Mark" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('owner.footer') <!-- Include the footer -->
      </div>
    </div>
  </div>
</body>
