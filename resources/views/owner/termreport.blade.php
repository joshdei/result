@include('owner.header')

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      @include('owner.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          
          <!-- Add Academic Term Form -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Academic Term</h4>
                  <p class="card-description">Fill in the details of the academic term</p>
                  
                  <form class="forms-sample" method="POST" action="{{ route('term.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="session">Academic Year (e.g., 2023/2024)</label>
                      <select class="form-control" id="session" name="session" required>
                        <option value="">Select Academic Year</option>
                        @for ($year = date('Y'); $year >= 2000; $year--)
                          <option value="{{ $year }}/{{ $year + 1 }}">{{ $year }}/{{ $year + 1 }}</option>
                        @endfor
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="start_date">Term Start Date</label>
                      <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Display Academic Terms Table -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Academic Terms</h4>
                  <p class="card-description">List of all academic terms</p>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th>Academic Year</th>
                          <th>Term Start Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                           @foreach ($academicterms as $term)
                            <tr>
                              <td>{{ $term->session }}</td>
                              <td>{{ $term->start_date }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <!-- Edit Button -->
                                 
                                  <!-- Delete Button (with confirmation) -->
                                  <form action="{{ route('destroyterm', $term->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this academic term?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-icon-text">
                                      Delete
                                      <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                    </button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                    
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
        @include('owner.footer')
      </div>
    </div>
  </div>
</body
