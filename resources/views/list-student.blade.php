@extends('layouts.app-1')

@section('content')


    @if (session('status'))
        <div class="alert alert-success w-50 position-absolute text-center alert-dismissible fade show" style="z-index: 8;"
            role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger w-50 position-absolute text-center alert-dismissible fade show" style="z-index: 8;"
            role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container">

        <div class="parent d-flex justify-content-between">
            <form class="form-floating w-25" method="get" action="{{ route('list-students') }}">
                <input type="search" name="search" value="{{ request()->query('search') }}" class="form-control"
                    id="floatingInputValue" placeholder=".">
                <label for="floatingInputValue">أدخل كلمة البحث هنا </label>
            </form>

            {{-- <div>
                {{ $students->appends(['search' => request()->query('search')])->links() }}
            </div> --}}

            {{-- include import excel file butto in the students page --}}
            @include('includes.import-excel')

            {{-- include export excel file butto in the students page --}}
            {{-- @include('includes.export-excel') --}}

            <a href="{{ route('create-student') }}" class="btn btn-primary text-decoration-none text-white"><span
                class="fw-bold fs-4">+</span> إضافة طالب جديد</a>


            {{-- include the list of students that shared between this page (list-students) and (show-room) page --}}
            @include('includes.list')


        @endsection
