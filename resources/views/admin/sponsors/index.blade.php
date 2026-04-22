@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col text-center">
                <h2 class="text-danger mb-3"><strong>Le Nostre Sponsor</strong></h2>
                <p>
                    Queste sono le tipologie di sponsorizzazione che offriamo. Attivandole, potrai mettere in evidenza il
                    tuo appartamento, aumentando così le possibilità di affittarlo.
                </p>
            </div>
        </div>
        <div class="row my-3  d-flex justify-content-center">
            @foreach ($sponsors as $sponsor)
                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <div class="card {{ $sponsor->name === 'Plus' ? 'border-danger border-2 shadow-lg' : '' }}"
                        style="min-height: 300px">
                        @if ($sponsor->name === 'plus')
                            <div class="text-center pt-2">
                                <span class="badge bg-danger"><i class="fa-solid fa-star"></i> Più popolare</span>
                            </div>
                        @endif

                        <div class="card-body  d-flex align-items-center justify-content-center flex-column">
                            <h3 class="card-title text-capitalize text-danger">
                                <strong>{{ $sponsor->name }}</strong>
                            </h3>
                            <div class="d-flex justify-content-center">
                                <p class="card-text mx-2"><strong>Durata dello Sponsor:</strong></p>
                                <p>{{ $sponsor->hours }} h</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text mx-2"><strong>Costo dello Sponsor:</strong></p>
                                <p>{{ $sponsor->price }} <i class="fa-solid fa-euro-sign"></i></p>
                            </div>
                        </div>

                        <div class="card-footer text-body-secondary">
                            <a href="{{ route('admin.sponsors.payment', ['sponsor' => $sponsor->id, 'apartment' => $apartment->id]) }}"
                                class="btn btn-principal w-100">
                                Attiva Sponsor
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
