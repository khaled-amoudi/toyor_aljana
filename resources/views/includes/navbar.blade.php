    <!--###############-->
    <!-- Navbar Start -->
    <!--###############-->

    <nav class="navbar p-3 navbar-dark bg-custom-hz">
        <div class="container-fluid">
            <div></div>
            <div class="d-flex justify-content-between">
                <span class="navbar-brand fs-4 mb-0 h1">روضة طيور الجنة النموذجية</span>
            </div>
            <div class="text-white">


                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Admin
                    </button>
                    <ul class="dropdown-menu text-end">
                        <li><a class="dropdown-item" href="#"> <i class="fas fa-key"></i>  تغيير كلمة المرور</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm">
                                        <span>تسجيل الخروج</span>
                                        <i class="fas fa-sign-out-alt m-2"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                {{-- post ما رضي يعمل تسجيل خروج ليييش ؟؟ لانه لازم يكون الزر عبارة عن فوورم وله ميثود من نوع --}}

                {{-- <a href="{{ route('logout') }}" class="link-light text-decoration-none">
                        <span>تسجيل الخروج</span>
                        <i class="fas fa-sign-out-alt m-2"></i>
                    </a> --}}







                {{-- هاد طريقة من النت, بس خلص ملهاش لزوم --}}
                {{-- <a href="{{ route('logout') }}" class="link-light text-decoration-none" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <span>تسجيل الخروج</span>
                    <i class="fas fa-sign-out-alt m-2"></i>
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form> --}}

            </div>
        </div>
    </nav>

    <!--###############-->
    <!-- Navbar Start -->
    <!--###############-->
