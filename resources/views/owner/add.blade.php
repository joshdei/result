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
    @include('owner.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
           
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Teacher</h4>
                    <p class="card-description">Fill in the details of the teacher</p>
                    <form class="forms-sample" action="{{ route('teachers.store') }}" method="POST">
                      @csrf <!-- CSRF protection -->
                      
                      <div class="form-group">
                        <label for="teacherName">Name</label>
                        <input type="text" class="form-control" id="teacherName" name="name" placeholder="Enter Teacher's Name" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherEmail">Email address</label>
                        <input type="email" class="form-control" id="teacherEmail" name="email" placeholder="Enter Teacher's Email" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherPassword">Password</label>
                        <input type="password" class="form-control" id="teacherPassword" name="password" placeholder="Enter Password" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherPhone">Phone Number</label>
                        <input type="tel" class="form-control" id="teacherPhone" name="phone" placeholder="Enter Phone Number" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherClass">Class</label>
                       <select name="class" id="class" class="form-control" required>
            <option value="">Select Class</option>
            <option value="Preparatory Class">Preparatory Class</option>
            <option value="Nursery 1">Nursery 1</option>
            <option value="Nursery 2">Nursery 2</option>
            <option value="KG 1">KG 1</option>
            <option value="KG 2">KG 2</option>
            <option value="Basic One">Basic One</option>
            <option value="Basic Two">Basic Two</option>
            <option value="Basic Three">Basic Three</option>
            <option value="Basic Four">Basic Four</option>
            <option value="Basic Five">Basic Five</option>
            <option value="Basic Six">Basic Six</option>
            <option value="Basic Seven (JSS 1)">Basic Seven (JSS 1)</option>
            <option value="Basic Eight (JSS 2)">Basic Eight (JSS 2)</option>
            <option value="Basic Nine (JSS 3)">Basic Nine (JSS 3)</option>
            <option value="SS 1">SS 1</option>
            <option value="SS 2">SS 2</option>
            <option value="SS 3">SS 3</option>
        </select>
                      
                      
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherDob">Date of Birth</label>
                        <input type="date" class="form-control" id="teacherDob" name="dob">
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherAddress">Address</label>
                        <input type="text" class="form-control" id="teacherAddress" name="address" placeholder="Enter Address">
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherHireDate">Hire Date</label>
                        <input type="date" class="form-control" id="teacherHireDate" name="hire_date">
                      </div>
                      
                      <div class="form-group">
                        <label for="teacherGender">Gender</label>
                        <select class="form-select" id="teacherGender" name="gender" required>
                          <option value="" disabled selected>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
              
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              


         
          </div>
        </div>
@include('owner.footer')