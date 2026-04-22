@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        {{-- resources/views/admin/dashboard.blade.php --}}
        <div class="row g-4 mb-4">

            <div class="col-md-4">
                <div class="card card-dash text-white h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="fa-solid fa-house fa-2x"></i>
                        <div>
                            <div>I tuoi appartamenti</div>
                            <div class="fs-3 fw-bold">{{ $apartmentsCount }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-dash text-white h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="fa-solid fa-envelope fa-2x"></i>
                        <div>
                            <div>Messaggi ricevuti</div>
                            <div class="fs-3 fw-bold">{{ $messagesCount }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-dash text-white h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="fa-solid fa-eye fa-2x"></i>
                        <div>
                            <div>Visualizzazioni totali</div>
                            <div class="fs-3 fw-bold">{{ $totalViews }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
