@include('teacher.header')

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- Navbar content here -->
    </nav>

    <div class="container-fluid page-body-wrapper">
      @include('teacher.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                <form action="{{ route('student.saveBehavior') }}" method="POST">
    @csrf
    <h2>Student Behavior</h2>
    <table class="table table-striped project-orders-table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Punctuality</th>
                <th>Assignment Submission</th>
                <th>Sense of Responsibility</th>
                <th>Neatness</th>
                <th>Cooperation</th>
                <th>Participation</th>
                <th>Respectfulness</th>
                <th>Overall Behavior</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td><input type="number" name="students[{{ $student->id }}][punctuality]" value="{{ $student->punctuality }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][assignment_submission]" value="{{ $student->assignment_submission }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][sense_of_responsibility]" value="{{ $student->sense_of_responsibility }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][neatness]" value="{{ $student->neatness }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][cooperation]" value="{{ $student->cooperation }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][participation]" value="{{ $student->participation }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][respectfulness]" value="{{ $student->respectfulness }}" max="5" min="1" class="form-control"></td>
                <td><input type="number" name="students[{{ $student->id }}][overall_behavior]" value="{{ $student->overall_behavior }}" max="5" min="1" class="form-control"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary mt-3">Submit Behavior</button>
</form>

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
