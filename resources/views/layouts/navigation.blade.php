<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
                <span class="login-status online"></span>
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                <span class="text-secondary text-small">{{ Auth::user()->roles->first()->display_name }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-criminals')}}">
                    <span class="menu-title">Criminals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-crimes')}}">
                    <span class="menu-title">Crimes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-places')}}">
                    <span class="menu-title">Places</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('user'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('user-who')}}">
                    <span class="menu-title">Who</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user-what')}}">
                    <span class="menu-title">What</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user-where')}}">
                    <span class="menu-title">Where</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user-experiences')}}">
                    <span class="menu-title">Share Experience</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
