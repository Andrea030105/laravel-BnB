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
            @foreach ($apartments as $apartment)
                <div class="col-12 my-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                                        <button class="ms-2 btn btn-square btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}">
                                        <button class="ms-2 btn btn-square btn-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
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
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <img src="https://picsum.photos/200/300" class="img-fluid rounded-1" alt="...">
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
            @endforeach
        </div>
    </div>
@endsection
