@include('owner.header')

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      @include('owner.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          
          <!-- Add Resumption Date Form -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Date of Resumption</h4>
                  <p class="card-description">Fill in the details of the date of resumption</p>
                  
                  <form class="forms-sample" method="POST" action="{{ route('resumption.store') }}">
                    @csrf
                    

                    <div class="form-group">
                      <label for="resumption_date">Date of Resumption</label>
                      <input type="date" class="form-control" id="resumption_date" name="resumption_date" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Display Resumption Dates Table -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Dates of Resumption</h4>
                  <p class="card-description">List of all resumption dates</p>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th>Date of Resumption</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($resumptionDates as $resumption)
                          <tr>
                            <td>{{ $resumption->date_of_resumption }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <!-- Edit Button (if needed) -->
                                
                                <!-- Delete Button (with confirmation) -->
                                <form action="{{ route('destroyResumption', $resumption->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resumption date?');">
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
