
<body>
    <div class="container-scroller">
        @include('owner.header') <!-- Include the header -->

        <div class="container-fluid page-body-wrapper">
           
                @include('owner.sidebar')

                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="table-responsive pt-3">
                                        <table class="table table-striped project-orders-table">
                                            <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    @foreach ($classes as $class)
                                                        <tr>
                                                            <td>{{ $class->class }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <!-- Edit Button -->
                                                                    <a href="{{ route('viewclasubjects', $class->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
View
</a>

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
                    @include('owner.footer')
                </div>
      
        </div>
    </div>
</body>

