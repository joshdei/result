
             
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
 
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
           
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Teacher</h4>
                    <p class="card-description">Fill in the details of the teacher</p>
                    <form class="forms-sample" action="{{ route('ownerofschoolcomplete') }}"  enctype="multipart/form-data" method="POST">
                    @csrf 
                    
                    <div class="form-group">
                      <label for="schoolName">Name of School</label>
                      <input type="text" class="form-control" id="schoolName" name="school_name" placeholder="Enter School Name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="schoolEmail">School Email</label>
                      <input type="email" class="form-control" id="schoolEmail" name="school_email" placeholder="Enter School Email" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="schoolMotto">School Motto</label>
                      <input type="text" class="form-control" id="schoolMotto" name="school_motto" placeholder="Enter School Motto" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="numberOfClasses">Number of Classes</label>
                      <input type="number" class="form-control" id="numberOfClasses" name="number_of_classes" placeholder="Enter Number of Classes" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="numberOfTeachers">Number of Teachers</label>
                      <input type="number" class="form-control" id="numberOfTeachers" name="number_of_teachers" placeholder="Enter Number of Teachers" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="schoolAddress">School Address</label>
                      <input type="text" class="form-control" id="schoolAddress" name="school_address" placeholder="Enter School Address" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="ownerGender">Owner of School Gender</label>
                      <select class="form-select" id="ownerGender" name="owner_gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>School Logo Upload</label>
                      <input type="file" name="school_logo" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload School Logo">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Owner of School Passport Upload</label>
                      <input type="file" name="owner_passport" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Owner's Passport">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Owner of School NIN Upload</label>
                      <input type="file" name="owner_nin" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Owner's NIN">
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