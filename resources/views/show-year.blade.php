@extends('layouts.app-1')

@section('content')

    <div class="container">

        <div class="parent d-flex justify-content-between">
            <form class="form-floating w-25" method="get" action="{{ route('show-year', $year->id) }}">
                <input type="search" name="search" value="{{ request()->query('search') }}" class="form-control"
                    id="floatingInputValue" placeholder=".">
                <label for="floatingInputValue">أدخل كلمة البحث هنا </label>
            </form>

            {{-- include export excel file butto in the students page --}}
            {{-- @include('includes.export-excel') --}}


            {{-- include the list of students that shared between this page (list-students) and (show-room) page --}}
            @include('includes.list')


        @endsection
