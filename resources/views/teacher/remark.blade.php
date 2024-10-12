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
                <form action="{{ route('student.saveSkills') }}" method="POST">
    @csrf
    <h2>Student Skills</h2>
    <table class="table table-striped project-orders-table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Handwriting</th>
                <th>Fluency</th>
                <th>Sports</th>
                <th>Craft</th>
                <th>Drawing/Painting</th>
                <th>Music</th>
                <th>Home Management</th>
                <th>Swimming</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td><input type="number" name="students[{{ $student->id }}][handwriting]" value="{{ $student->handwriting }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][fluency]" value="{{ $student->fluency }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][sports]" value="{{ $student->sports }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][craft]" value="{{ $student->craft }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][drawing]" value="{{ $student->drawing }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][music]" value="{{ $student->music }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][home_management]" value="{{ $student->home_management }}" max="5" min="1" class="form-control" required></td>
                <td><input type="number" name="students[{{ $student->id }}][swimming]" value="{{ $student->swimming }}" max="5" min="1" class="form-control" required></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary mt-3">Submit Skills</button>
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
