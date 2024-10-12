@include('owner.header')
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

    <div class="container-fluid page-body-wrapper">      
      @include('owner.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Class</h4>
                 

                  <p class="card-description">Add  class Arm</p>
                  <form class="forms-sample" action="{{ route('classarms.store') }}" method="POST">
    @csrf <!-- CSRF protection -->
    
    <div class="form-group">
        <label for="class">Select Class</label>
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
        <label for="arm">Select Arm</label>
        <select name="arm" id="arm" class="form-control" required>
            <option value="">Select Arm</option>
            @foreach (range('A', 'Z') as $letter)
                <option value="{{ $letter }}">{{ $letter }}</option>
            @endforeach
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
        @include('owner.footer')
