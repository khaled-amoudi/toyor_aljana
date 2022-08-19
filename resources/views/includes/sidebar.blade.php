    <!--###############-->
    <!-- Sidebar Start -->
    <!--###############-->
    <div class="col bg-custom-vr" style="min-height: 135vh;">
        <div class="d-flex flex-column mt-2 flex-shrink-0 h-100">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li class="nav-item justify-content-start">
                    <a href="{{ route('home') }}" class="nav-link link-light py-3 d-flex align-items-center"
                        aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fas fa-home i-sidebar"></i>
                        <span class="me-3 text-white">الرئيسية</span>
                    </a>
                </li>
                <li class="nav-item justify-content-start">
                    <a href="{{ route('create-student') }}" class="nav-link link-light py-3 d-flex align-items-center"
                        title="list" data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fas fa-plus"></i>
                        <span class="me-3 text-white">إضافة طالب</span>
                    </a>
                </li>
                <li class="nav-item justify-content-start">
                    <a href="{{ route('list-students') }}" class="nav-link link-light py-3 d-flex align-items-center"
                        title="list" data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fas fa-list"></i>
                        <span class="me-3 text-white">عرض الطلاب</span>
                    </a>
                </li>
                <li class="nav-item justify-content-start">
                    <a href="{{ route('rooms') }}" class="nav-link link-light py-3 d-flex align-items-center"
                        title="list" data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="me-3 text-white">الصفوف</span>
                    </a>
                </li>

                {{-- <hr class="text-white">

                <li class="nav-item justify-content-start">
                <li class="my-2"></li>
                <li class="mb-1 d-flex flex-column justify-content-start">
                    <button class="btn btn-outline-light w-75 btn-toggle rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#orders-collapse" aria-expanded="false">
                        الخدمات
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav text-white list-unstyled pb-3">
                            <li class="py-2 pt-4 text-end"><i class="fas fa-caret-left ms-2"></i><a href="{{ route('create-student') }}"
                                    class="link-light text-decoration-none rounded">إضافة طالب</a></li>
                            <li class="py-2 text-end"><i class="fas fa-caret-left ms-2"></i><a href="#"
                                    class="link-light text-decoration-none rounded">الصفوف</a></li>
                            <li class="py-2 text-end"><i class="fas fa-caret-left ms-2"></i><a href="#"
                                    class="link-light text-decoration-none rounded">المعلمين</a></li>
                        </ul>
                    </div>
                </li>
                </li> --}}

            </ul>
        </div>
    </div>
    <!--###############-->
    <!-- Sidebar End -->
    <!--###############-->
