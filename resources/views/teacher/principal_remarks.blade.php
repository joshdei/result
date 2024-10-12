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
                  <form action="{{ route('savePrincipalremarks') }}" method="POST">
                    @csrf
                    <h2>Student Remarks</h2>
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Remark</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->name }}</td>
                          <td>
                          <select name="students[{{ $student->id }}][remark]" class="form-control" required>
    <option value="">Select Remark</option>
    <option value="She is human and calm">She is human and calm</option>
    <option value="She is nice">She is nice</option>
    <option value="She is hardworking">She is hardworking</option>
    <option value="She is creative">She is creative</option>
    <option value="She is responsible">She is responsible</option>
    <option value="She is attentive">She is attentive</option>
    <option value="She is friendly">She is friendly</option>
    <option value="She is respectful">She is respectful</option>
    <option value="She is punctual">She is punctual</option>
    <option value="She is ambitious">She is ambitious</option>
    <option value="She struggles with focus">She struggles with focus</option>
    <option value="She is often late">She is often late</option>
    <option value="She needs to improve her attitude">She needs to improve her attitude</option>
    <option value="She has difficulty completing assignments">She has difficulty completing assignments</option>
    <option value="She can be disruptive in class">She can be disruptive in class</option>
    <option value="She is not engaged in class">She is not engaged in class</option>
    <option value="She requires additional support">She requires additional support</option>
</select>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3">Submit Remarks</button>
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
