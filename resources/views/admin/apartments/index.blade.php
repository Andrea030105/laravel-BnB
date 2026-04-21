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

        @if (session('message_danger'))
            <div class="row">
                <div class="col my-3">
                    <div class="alert alert-danger">
                        {{ session('message_danger') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col my-3">
                <a href="{{ route('admin.apartments.create') }}">
                    <button class="btn btn-square btn-primary">
                        Add Apartment
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            @forelse ($apartments as $apartment)
                <div class="col-12 my-3">
                    <div class="card text-center">
                        <div class="card-header d-flex justify-content-between">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-square btn-primary"
                                        href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-square btn-warning"
                                        href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-square btn-success"
                                        href="{{ route('admin.messages.index', ['apartment' => $apartment->id]) }}">
                                        <i class="fa-solid fa-message"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ms-2 btn btn-square btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-square btn-info"
                                        href="{{ route('admin.sponsors.index', ['apartment' => $apartment->id]) }}">
                                        <i class="fa-solid fa-credit-card"></i>
                                        <span>Sponsor</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-square btn-danger"
                                        href="{{ route('admin.stats.index', ['apartment' => $apartment->id]) }}">
                                        <i class="fa-solid fa-chart-column"></i>
                                        <span>Stats</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <img src="{{ asset('storage/' . $apartment->image) }}" class="img-fluid rounded-1"
                                    alt="{{ $apartment->title }}">
                            </div>
                            <div class="col-md-8 d-flex justify-content-center align-items-center">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $apartment->title }}</h3>
                                    <p class="card-text">{{ $apartment->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col">
                        <h3>
                            Nessun Appartamento Caricato
                        </h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
