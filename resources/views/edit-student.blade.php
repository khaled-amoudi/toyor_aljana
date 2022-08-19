@extends('layouts.app-1')

@section('content')

    <div class="d-flex justify-content-center">
        @if (Session::has('success'))
            <div class="alert w-50 mt-2 alert-success alert-dismissible fade show position-absolute" style="z-index: 7"
                role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {{-- <script>
                setTimeout(function() {
                    window.location.href = "/list-students"
                }, 1000); // 1 second
            </script> --}}
            {{-- @else
        <div class="alert m-4 w-50 alert-danger alert-dismissible fade show" role="alert">
            فشلت عملية التعديل, حاول مرة أخرى ❌
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        @endif
    </div>

    @include('includes.back')
    <div class="container pt-5 shadow-lg rounded-3 bg-white custom-border">

        <form action="{{ route('update-student', $student->id) }}" method="post" class="p-4"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-floating mb-4">
                        <input name="name" type="text" class="form-control" value="{{ $student->name }}" id="fullName"
                            placeholder=".">
                        <label for="fullName">إسم الطالب رباعي</label>
                        @error('name')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-floating mb-4">
                        <input name="idNumber" type="text" class="form-control" value="{{ $student->idNumber }}"
                            id="idNumber" placeholder=".">
                        <label for="idNumber">رقم هوية الطالب</label>
                        @error('idNumber')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-floating mb-4">
                        <input name="birthday" type="date" class="form-control" value="{{ $student->birthday }}"
                            id="birthday" placeholder=".">
                        <label for="birthday">تاريخ الميلاد</label>
                        @error('birthday')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 mb-4">
                    <div class="form-floating">
                        <select name="stage" class="form-select" id="stu-state"
                            aria-label="Floating label select example" required>
                            <option value="1" @if ($student->stage == '1') selected @endif>البستان</option>
                            <option value="2" @if ($student->stage == '2') selected @endif>التمهيدي</option>
                            <option value="3" @if ($student->stage == '3') selected @endif>الحضانة</option>
                        </select>
                        <label for="stu-state">المرحلة الدراسية</label>
                    </div>
                    @error('stage')
                        <small class="form-text text-danger">* {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-3 mb-4">
                    <div class="form-floating">
                        <select name="fastTest" class="form-select" id="fastTest"
                            aria-label="Floating label select example" required>
                            <option value="1" @if ($student->fastTest == '1') selected @endif>لم يتم التحديد</option>
                            <option value="2" @if ($student->fastTest == '2') selected @endif>ضعيف</option>
                            <option value="3" @if ($student->fastTest == '3') selected @endif>متوسط</option>
                            <option value="4" @if ($student->fastTest == '4') selected @endif>ممتاز</option>
                        </select>
                        <label for="fastTest">نتيجة الإختبار السريع</label>
                    </div>
                    @error('fastTest')
                        <small class="form-text text-danger">* {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-3 mb-4">

                    <div class="form-floating">
                        <select name="gender" class="form-select" id="gender" aria-label="Floating label select example"
                            required>
                            <option value="0" @if ($student->gender == '0') selected @endif>ذكر</option>
                            <option value="1" @if ($student->gender == '1') selected @endif>أنثى</option>
                        </select>
                        <label for="gender">الجنس</label>
                    </div>
                    @error('gender')
                        <small class="form-text text-danger">* {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-3 mb-4">
                    <div class="form-floating">
                        <select name="year_id" class="form-select" id="year_id" aria-label="Floating label select example"
                            required>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}" @if ($student->year_id == $year->id) selected @endif >{{ $year->name }}</option>
                            @endforeach
                        </select>
                        <label for="year">السنة الدراسية</label>
                    </div>
                    @error('year_id')
                        <small class="form-text text-danger">* {{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <select name="room_id" class="form-select" id="room_id" aria-label="Floating label select example"
                            required>

                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" @if ($student->room_id == $room->id) selected @endif>{{ $room->name }}</option>
                            @endforeach
                        </select>
                        <label for="room_id">تحديد الصف</label>
                    </div>
                    @error('room_id')
                        <small class="form-text text-danger">* {{ $message }}</small>
                    @enderror
                </div>

                <div class="col">
                    <div class="form-floating mb-4">
                        <input name="location" type="text" class="form-control" value="{{ $student->location }}"
                            id="address" placeholder=".">
                        <label for="address">عنوان السكن</label>
                        @error('location')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3 d-flex justify-content-center">
                <hr class="w-75">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-4">
                        <input name="phone" type="text" class="form-control" value="{{ $student->phone }}"
                            id="phoneNumber" placeholder=".">
                        <label for="phoneNumber">رقم الجوال</label>
                        @error('phone')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating mb-4">
                        <input name="fatherIdNumber" type="text" class="form-control"
                            value="{{ $student->fatherIdNumber }}" id="fatherIdNumberHelp" placeholder=".">
                        <label for="fatherIdNumberHelp">رقم هوية الأب</label>
                        @error('fatherIdNumber')
                            <small class="form-text text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <div class="mb-4">
                        <label for="floatingTextarea" class="form-label"></label>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea">{{ $student->description }}</textarea>
                            <label for="floatingTextarea">ملاحظات</label>
                            @error('description')
                                <small class="form-text text-danger">* {{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="m-4 d-flex justify-content-center align-item-center">
                        <button type="submit" class="btn btn-primary p-3 btn-lg">تأكيد التعديل</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
