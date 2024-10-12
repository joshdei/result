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
                  <h4 class="card-title">Add Academic Days</h4>
                  <p class="card-description">Fill in the details of the academic days</p>
                  
                  <form class="forms-sample" method="POST" action="{{ route('storedays') }}">
                    @csrf
                    <div class="form-group">
                      <label for="session">Academic Days</label>
                  
                      <input type="number" class="form-control" id="days" name="days" required>

                   
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
                  <h4 class="card-title">Academic Days</h4>
                  <p class="card-description">List of all academic days</p>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th>Days </th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($schooldays as $day)
                            <tr>
                              <td>{{ $day->days }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <!-- Delete Button (with confirmation) -->
                                  <form action="{{ route('destroydays', $day->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this academic term?');">
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
</body>
