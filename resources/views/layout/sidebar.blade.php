<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><span><strong>Yoman Jazzar</strong></span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="../assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{auth()->user()->name}}</strong></a>
                {{-- <ul class="d-none dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('pages.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="{{route('email.inbox')}}"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('authentication.login')}}"><i class="icon-power"></i>Logout</a></li>
                </ul> --}}
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="header">Company</li>
                <li>
                    <a href="{{route('companies.index')}}"><i class="icon-diamond"></i><span>All</span></a>
                </li>
                <li>
                    <a href="{{route('companies.create')}}"><i class="icon-home"></i><span>Add</span></a>
                </li>

                <li class="header">Employee</li>
                <li>
                    <a href="{{route('employees.index')}}"><i class="icon-diamond"></i><span>All</span></a>
                </li>
                <li>
                    <a href="{{route('employees.create')}}"><i class="icon-home"></i><span>Add</span></a>
                </li>





            </ul>
        </nav>
    </div>
</div>
