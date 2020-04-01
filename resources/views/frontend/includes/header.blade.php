<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/img/core-img/logo.jpg') }}" alt="" width="100px" ></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li class="current-item"><a href="{{ url('/') }}">الدروس</a></li>
                            <li><a href="{{ url('/logout') }}"> تسجيل الخروج </a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
