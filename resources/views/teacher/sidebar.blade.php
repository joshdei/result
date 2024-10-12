<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('teacherindex')}}">
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
                        <a class="nav-link" href="{{route('subject')}}">Subject</a>
                    </li>
                </ul>
            
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('result')}}">Result</a>
                    </li>
                </ul>
            
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('remark')}}">Srudent Skills</a>
                    </li>
                </ul>
            
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('behavior')}}">Behavior</a>
                    </li>
                </ul>
            
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('remarksstudent')}}">Remarks Student</a>
                    </li>
                </ul>
            
            </div>


            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('principalremarks')}}">Principal Remark </a>
                    </li>
                </ul>
            
            </div>

           <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('student.create')}}">Create Student</a>
                    </li>
                </ul>
         
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('stordays')}}">School Days</a>
                    </li>
                </ul>
         
            </div>

            <div class="collapse" id="teachers-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{route('studentdays')}}">Student  Days</a>
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
