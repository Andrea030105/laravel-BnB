@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col text-center">
                <h2 class=" text-primary mb-3">Le Nostre Sponsor</h2>
                <p>
                    Queste sono le tipologie di sponsorizzazione che offriamo. Attivandole, potrai mettere in evidenza il
                    tuo appartamento, aumentando così le possibilità di affittarlo.
                </p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col d-flex justify-content-around">
                @foreach ($sponsors as $sponsor)
                    <div class="card text-center w-25">
                        <div class="card-body">
                            <h3 class="card-title text-capitalize text-danger"><strong>{{ $sponsor->name }}</strong></h3>
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
                                class="btn btn-primary">Attiva Sponsor
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
