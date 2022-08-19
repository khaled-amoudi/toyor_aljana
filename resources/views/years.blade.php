@extends('layouts.app-1')

@section('content')

    <div class="d-flex justify-content-between ms-3">
        <div class="header mb-4">
            <h3 class="navbar-brand" style="color: #eb5e5e;">السنوات الدراسية</h3>
        </div>
        <button type="button" class="btn mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            +
        </button>
        @error('name')
            <div class="alert alert-danger text-center w-50">{{ $message }}</div>
        @enderror
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('create-year') }}" method="post" class="pt-3 px-3">
                    @csrf

                    <div class="modal-body">
                        <div class="form-floating mb-4">
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" id="year_name"
                                placeholder=".">
                            <label for="year_name">إسم السنة الدراسية</label>
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




    <div class="row text-center text-white">
        @foreach ($years as $year)
            <div class="col-3">
                <a href="{{ route('show-year', $year->id) }}" class="link-light text-decoration-none">
                    <div class="card p-3 bg-custom-hz">
                        <div class="card-body">
                            <h2>{{ $year->name }}</h2>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
