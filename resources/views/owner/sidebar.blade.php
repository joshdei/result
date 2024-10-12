<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('/')}}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-danger">new</div>
            </a>
        </li>

        <!-- Teachers -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#teachers-menu" aria-expanded="false" aria-controls="teachers-menu">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">Teachers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('add')}}">Add</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Class -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#class-menu" aria-expanded="false" aria-controls="class-menu">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">Class</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="class-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addclass')}}">Assign Teacher</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addscorespoint')}}">Assign Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewteacher')}}">View Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addarm')}}">Add Arm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewarm')}}">View Arm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addsubject')}}">Assign Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewsubject')}}">View Subject</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('complete')}}">View School information</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('termsession')}}">View Term Session</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('terms')}}">View Term </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('termresumption')}}">Term Resumption</a>
                    </li>
                 
                </ul>
            </div>
        </li>

        <!-- User Pages -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-pages" aria-expanded="false" aria-controls="user-pages">
                <i class="typcn typcn-user-add-outline menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-pages">
                <ul class="nav flex-column sub-menu">
                    <!-- Logout Button as a List Item -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger nav-link" style="width: 100%; border: none; text-align: left;">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
