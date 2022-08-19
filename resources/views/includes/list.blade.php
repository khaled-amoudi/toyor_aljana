{{-- <div>
                {{ $students->appends(['search' => request()->query('search')])->links() }}
            </div> --}}

{{-- <a href="{{ route('create-student') }}" class="btn btn-primary text-decoration-none text-white"><span
                class="fw-bold fs-4">+</span> إضافة طالب جديد</a> --}}
</div>

<table class="table table-dark table-striped shadow-lg mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>إسم الطالب/ة</th>
            <th>الصف</th>
            <th>المرحلة الدراسية</th>
            <th>تاريخ الميلاد</th>
            <th>الجنس</th>
            <th>رقم الجوال</th>
            {{-- <th>المالية</th> --}}
            {{-- <th>
                    إتخاذ إجراء
                </th> --}}
        </tr>
    </thead>
    <tbody>

        @forelse ($students as $std)
            <tr>
                <th>{{ $i++ }}</th>
                <td>
                    {{ $std->name }}


                    <div class="list-links">
                        <a href="{{ route('show-student', $std->id) }}" class="link-warning ms-1"><small>عرض
                                الطالب</small></a>
                        <a href="{{ route('edit-student', $std->id) }}" class="link-info ms-1"><small>تعديل</small></a>
                        <a href="{{ route('show-finance', $std->id) }}" class="link-success ms-1"><small>المالية</small></a>
                        <!-- Button trigger modal -->
                        <a href="" class="link-danger ms-1" data-bs-toggle="modal"
                            data-bs-target="{{ '#exampleModal' . $std->id }}"><small>حذف</small></a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade text-danger" id="{{ 'exampleModal' . $std->id }}" tabindex="-1"
                        aria-labelledby="{{ 'exampleModal' . $std->id . 'Label' }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border d-flex justify-content-between flex-column">
                                    <h5 class="modal-title" id="{{ 'exampleModal' . $std->id . 'Label' }}">
                                        تأكيد
                                        عملية الحذف !!</h5>
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-dark fw-bold">
                                    <br>
                                    تأكيد عملية الحذف سيؤدي إلى حذف جميع بيانات هذا الطالب !!
                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">إلغاء</button>

                                    <a class="btn btn-danger text-decoration-none text-white"
                                        href="{{ route('delete-student', $std->id) }}">تأكيد الحذف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td>{{ $std->room_id }}</td>
                <td>{{ $std->stage }}</td>
                <td>{{ $std->birthday }}</td>
                <td>{{ $std->gender }}</td>
                <td>{{ $std->phone }}</td>
                {{-- <td>
                    <a class="btn btn-sm btn-outline-success" href="{{ route('show-finance', $std->id) }}">
                        مراجعة
                    </a>
                </td> --}}




                {{-- <td>
                        <button class="btn btn-primary"><a href="{{ route('show-student', $std->id) }}"
                                class="text-decoration-none text-white">عرض الصفحة
                                الشخصية</a></button>
                        <button class="btn btn-success"><a href="{{ route('edit-student', $std->id) }}"
                                class="text-decoration-none text-white"><i class="fas fa-edit"></i></a></button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="{{ '#exampleModal' . $std->id }}"><i
                                class="fas fa-trash-alt"></i></button>
                        <!-- Modal -->
                        <div class="modal fade text-danger" id="{{ 'exampleModal' . $std->id }}" tabindex="-1"
                            aria-labelledby="{{ 'exampleModal' . $std->id . 'Label' }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border d-flex justify-content-between flex-column">
                                        <h5 class="modal-title" id="{{ 'exampleModal' . $std->id . 'Label' }}">
                                            تأكيد
                                            عملية الحذف !!</h5>
                                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark fw-bold">
                                        <br>
                                        تأكيد عملية الحذف سيؤدي إلى حذف جميع بيانات هذا الطالب !!
                                        <br><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">إلغاء</button>

                                        <a class="btn btn-danger text-decoration-none text-white"
                                            href="{{ route('delete-student', $std->id) }}">تأكيد الحذف</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td> --}}
            </tr>

        @empty
            <div class="alert alert-warning alert-dismissible fade show mt-3 text-center" role="alert">
                لا يوجد نتائج ل {{ request()->query('search') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforelse

    </tbody>
</table>
</div>
