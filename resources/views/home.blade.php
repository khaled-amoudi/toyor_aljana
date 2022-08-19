@extends('layouts.app-1')

@section('content')

    <!--###############-->
    <!-- Cards Start -->
    <!--###############-->
    <div class="row container-fluid">
        <div class="col-md-3">
            <div class="card card-1 position-relative border-0">
                <div class="overlay position-absolute">
                </div>
                <div class="card-body text-center text-white">
                    <h6>عدد الطلاب المسجلين</h5>
                        <h2>{{ $students_count }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-2 position-relative border-0">
                <div class="overlay position-absolute">
                </div>
                <div class="card-body text-center text-white">
                    <h6>الطلاب مستكملي الدفع</h5>
                        <h2>?</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-3 position-relative border-0">
                <div class="overlay position-absolute">
                </div>
                <div class="card-body text-center text-white">
                    <h6>عدد المعلمين</h5>
                        <h2>?</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-4 position-relative border-0">
                <div class="overlay position-absolute">
                </div>
                <div class="card-body text-center text-white">
                    <h6>عدد الصفوف</h5>
                        <h2>{{ $rooms_count }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix container my-3 d-flex justify-content-center">
        <hr class="w-75">
    </div>
    <!--###############-->
    <!-- Cards End -->
    <!--###############-->


    <!--###############-->
    <!-- Body Start -->
    <!--###############-->

    <div class="container serv">

        <div class="row container">

            <div class="col-md-4">
                <a href="{{ route('create-student') }}" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/add-student.svg') }}" width="150" height="150"
                                alt="Add New Student">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">إضافة طالب</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('list-students') }}" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/list-student.svg') }}" width="150" height="150"
                                alt="List All Students">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">عرض الطلاب</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('rooms') }}" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/classes.svg') }}" width="150" height="150" alt="Classes">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">الصفوف</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <div class="row container mt-4 d-flex justify-content-center">

            {{-- <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/financial.svg') }}" width="150" height="150" alt="Financial">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">المالية</h5>
                        </div>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/books.svg') }}" width="150" height="150" alt="Books">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">المنهاج التعليمي</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/teachers.svg') }}" width="150" height="150" alt="Teachers">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">المعلمين</h5>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-md-4">
                <a href="{{ route('years') }}" class="text-decoration-none">
                    <div class="card shadow border">
                        <div class="card-body d-flex justify-content-center position-relative">
                            <div class="overlay-1 position-absolute">
                            </div>
                            <img src="{{ asset('images/years.jpg') }}" width="150" height="150" alt="years">
                        </div>
                        <div class="text-dark text-center navbar-brand m-2">
                            <h5 class="mx-4">السنة الدراسية</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>


    </div>

    <!--###############-->
    <!-- Body End -->
    <!--###############-->

@endsection
