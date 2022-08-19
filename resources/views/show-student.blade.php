@extends('layouts.app-1')

@section('content')

    <div class="back-img">
        <div class="container p-4">
            <div class="card bg-primary shadow-lg m-4 rounded-3 custom-border">
                <div class="card-header fw-bolder fs-2">
                    {{ $student->name }}
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
