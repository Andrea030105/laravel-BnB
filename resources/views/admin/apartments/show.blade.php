@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="row">
                <div class="col my-3">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col my-3">
                <a href="{{ route('admin.apartments.index') }}">
                    <button class="btn btn-square btn-primary">
                        Torna Indietro
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <img src="https://picsum.photos/200/300" class="img-fluid rounded-1" alt="...">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h3 class="card-title">{{ $apartment->title }}</h3>
                                <p class="card-text">{{ $apartment->description }}</p>
                                <div class="my-3 d-flex align-items-center">
                                    <h5><strong>Servizi:</strong></h5>
                                    @if ($apartment->services->isEmpty())
                                        <span class="ms-3 badge text-bg-primary rounded-pill">Nulla
                                        </span>
                                    @else
                                        @foreach ($apartment->services as $service)
                                            <span class="ms-3 badge text-bg-primary rounded-pill">{{ $service->name }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                                <div>
                                    <ul class="list-group">
                                        <h5><strong>Info:</strong></h5>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Camere:</strong>
                                            <span
                                                class="ms-3 badge text-bg-primary rounded-pill">{{ $apartment->rooms }}</span>
                                        </li>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Camere da Letto:</strong>
                                            <span
                                                class="ms-3 badge text-bg-primary rounded-pill">{{ $apartment->rooms }}</span>
                                        </li>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Bagni:</strong>
                                            <span
                                                class="ms-3 badge text-bg-primary rounded-pill">{{ $apartment->rooms }}</span>
                                        </li>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Metri Queadraati:</strong>
                                            <span
                                                class="ms-3 badge text-bg-primary rounded-pill">{{ $apartment->square_meters }}
                                                <i class="fa-solid fa-ruler-combined"></i>
                                            </span>
                                        </li>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Visibile:</strong>
                                            <span class="ms-3 badge text-bg-primary rounded-pill">
                                                @if ($apartment->visibility == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </span>
                                        </li>
                                        <li class=" px-5 list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Prezzo:</strong>
                                            <span class="ms-3 badge text-bg-primary rounded-pill">
                                                {{ $apartment->price_per_night }}
                                                <i class="fa-solid fa-euro-sign"></i>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
