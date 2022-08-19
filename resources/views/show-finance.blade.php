@extends('layouts.app-1')

@section('content')
    <div class="container d-flex justify-content-end">
        <button class="btn btn-lg btn-primary mb-2" style="margin-left: 56px;" type="button" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">إضافة
            دفعة جديدة</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('create-amount', $student->id) }}" method="post" class="pt-3 px-3">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-4">
                            <input name="amount" type="number" class="form-control" value="{{ old('amount') }}"
                                id="amount" placeholder=".">
                            <label for="amount">المبلغ الذي تريد إضافته؟</label>
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





    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <table class="table table-dark table-striped shadow-lg mt-3">
                    <thead>
                        <tr>
                            <th>الإسم :</th>
                            <th class="text-center text-warning">{{ $student->name }}</th>
                        </tr>
                        <tr>
                            <th>الرسوم الكلية :</th>
                            <th class="text-center text-warning">400 شيكل</th>
                        </tr>
                    </thead>
                </table>

                <table class="table table-light table-striped shadow-lg mt-3">
                    <thead>
                        <tr>
                            <th>المبلغ المدفوع :</th>
                            <th class="text-center text-success">{{ $The_amount_paid }} شيكل</th>
                        </tr>
                        <tr>
                            <th>المبلغ المتبقي :</th>
                            <th class="text-center text-danger">{{ $remaining_amount }} شيكل</th>
                        </tr>
                    </thead>
                </table>

            </div>

            <div class="col-6">
                <table class="table table-dark table-striped shadow-lg mt-3 text-center">
                    <thead>
                        <tr class="text-info">
                            <th>#</th>
                            <th>الدفعات</th>
                            <th>تاريخ الدفعة</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($amounts as $amount)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $amount->amount }} ش</td>
                                <td>{{ $amount->created_at->toDateString(); }}</td>
                                <td>

                                    <a href="" class="link-danger ms-1" data-bs-toggle="modal"
                                        data-bs-target="{{ '#exampleModal' . $amount->id }}"><small>حذف</small></a>

                                        <!-- Modal -->
                                    <div class="modal fade text-danger" id="{{ 'exampleModal' . $amount->id }}" tabindex="-1"
                                        aria-labelledby="{{ 'exampleModal' . $amount->id . 'Label' }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header border d-flex justify-content-between flex-column">
                                                    <h5 class="modal-title"
                                                        id="{{ 'exampleModal' . $amount->id . 'Label' }}">
                                                        تأكيد
                                                        عملية الحذف !!</h5>
                                                    <button type="button" class="btn-close float-end"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">إلغاء</button>

                                                    <a class="btn btn-danger text-decoration-none text-white"
                                                        href="{{ route('delete-amount', $amount->id) }}">تأكيد الحذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger mt-3 text-center fw-bold">
                                لا يوجد أي دفعات حتى الآن
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
