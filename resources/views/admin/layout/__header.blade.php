<header class="main-header">
    <!-- Logo -->
    <a href="/backend/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" class="user-image" alt="{{ Auth::user()->name }}">
                        @else
                            <img src="/backend/dist/img/logo-admin.jpg" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" class="user-image" alt="{{ Auth::user()->name }}">
                            @else
                                <img src="/backend/dist/img/logo-admin.jpg" class="user-image" alt="User Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }} - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
{{--                            <div class="pull-left">--}}
{{--                                <a href="#" class="btn btn-default btn-flat">Setting</a>--}}
{{--                            </div>--}}
                            <div class="pull-right">
                                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Đăng Xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
