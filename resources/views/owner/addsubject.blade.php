@include('owner.header')
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- Navbar content -->
    </nav>
    <div class="container-fluid page-body-wrapper">
      @include('owner.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-caard">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Subjects for Classes</h4>
                  <form action="{{ route('subjects.store') }}" method="POST">
    @csrf

    <!-- Core Subjects Section -->
    <div class="form-group">
        <h5>Core Subjects (Select all applicable)</h5>
        <div>
            <input type="checkbox" name="core_subjects[]" value="English Language" id="english">
            <label for="english">English Language</label><br>
            <input type="checkbox" name="core_subjects[]" value="Mathematics" id="mathematics">
            <label for="mathematics">Mathematics</label><br>
            <input type="checkbox" name="core_subjects[]" value="Civic Education" id="civic">
            <label for="civic">Civic Education</label><br>
        </div>
    </div>

    <!-- Elective Subjects Section -->
    <div class="form-group">
        <h5>Elective Subjects (Select all applicable)</h5>
        <div>
            <input type="checkbox" name="elective_subjects[]" value="Agricultural Science">
            <label>Agricultural Science</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Basic Science">
            <label>Basic Science</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Christian Religious Studies">
            <label>Christian Religious Studies</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Computer Studies">
            <label>Computer Studies</label><br>
            <input type="checkbox" name="elective_subjects[]" value="English Studies">
            <label>English Studies</label><br>
            <input type="checkbox" name="elective_subjects[]" value="French">
            <label>French</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Hand Writing">
            <label>Hand Writing</label><br>
            <input type="checkbox" name="elective_subjects[]" value="History">
            <label>History</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Home Economics">
            <label>Home Economics</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Literature in English">
            <label>Literature in English</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Physical and Health Education">
            <label>Physical and Health Education</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Quantitative Reasoning">
            <label>Quantitative Reasoning</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Speech">
            <label>Speech</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Verbal Reasoning">
            <label>Verbal Reasoning</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Biology">
            <label>Biology</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Economics">
            <label>Economics</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Geography">
            <label>Geography</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Government">
            <label>Government</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Financial Accounting">
            <label>Financial Accounting</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Commerce">
            <label>Commerce</label><br>
            <input type="checkbox" name="elective_subjects[]" value="Data Processing">
            <label>Data Processing</label><br>
        </div>
    </div>

    <!-- Select Class Section -->
    <div class="form-group">
        <h5>Select Class</h5>
        <select name="class_id" class="form-control" required>
            <option value="">-- Select Class --</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class }}</option>
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
