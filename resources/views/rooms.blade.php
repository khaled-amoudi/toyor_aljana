@extends('layouts.app-1')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-end ms-3">

            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                إضافة صف جديد +
            </button>
        </div>
        @error('name')
            <div class="alert alert-danger text-center w-50">{{ $message }}</div>
        @enderror

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('create-room') }}" method="post" class="pt-3 px-3">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-4">
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                    id="room_name" placeholder=".">
                                <label for="room_name">إسم الصف الجديد</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">إضافة ✔️</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="row">

            @forelse ($rooms as $room)
                <div class="col-sm-6 my-3">
                    <div class="card shadow text-center" style="background: rgb(241,238,249);
                                    background: linear-gradient(18deg, rgba(241,238,249,1) 4%, rgba(245,204,246,1) 73%);">
                        <h5 class="card-header navbar-brand" style="color: #5e46c0">
                            {{ $room->name }}
                        </h5>
                        <div class="card-body">
                            <div class="m-3 p-3 row room-info justify-content-around">
                                <div class="col">
                                    <div class="room-item bg-white shadow d-flex justify-content-center align-items-center">
                                        {{ $room->students->count() }} طالب
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="room-item bg-white shadow d-flex justify-content-center align-items-center">
                                        2 معلم
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="{{ route('show-room', $room->id) }}" class="text-decoration-none">
                                        <div
                                            class="room-item bg-custom-hz shadow text-white d-flex justify-content-center align-items-center">
                                            عرض
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger text-center">
                    لم يتم إضافة الصفوف حتى هذه اللحظة
                </div>
            @endforelse

        </div>

    </div>

@endsection
