@extends('layouts.app-1')

@section('content')


    <div class="container">

        <div class="parent d-flex justify-content-between">
            <form class="form-floating w-25" method="get" action="{{ route('show-room', $room->id) }}">
                <input type="search" name="search" value="{{ request()->query('search') }}" class="form-control"
                    id="floatingInputValue" placeholder=".">
                <label for="floatingInputValue">أدخل كلمة البحث هنا </label>
            </form>

            <a href="{{ route('create-student') }}" class="btn btn-primary text-decoration-none text-white"><span
                class="fw-bold fs-4">+</span> إضافة طالب جديد</a>


            @include('includes.list')
            {{-- @include('includes.list', ['route' => "40"]) --}}

@endsection
