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
                  <form action="{{ route('student.saveDays') }}" method="POST">
                    @csrf
                    <h2>Student Days</h2>
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Days Present</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->name }}</td>
                          <td>
                            <input type="number" name="students[{{ $student->id }}][days]" class="form-control" required min="0" placeholder="Enter days present">
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3">Submit Days</button>
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
