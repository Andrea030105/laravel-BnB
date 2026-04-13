@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col my-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col my-3">
                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Titolo:</strong></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Add Title">
                    </div>
                    <div class="mb-3">
                        <div>
                            <img src="" class="img-apartment-width my-2" alt="">
                        </div>
                        <label for="image" class="form-label"><strong>Inserisci l'immagine:</strong>:</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Descrizione:</strong></label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Add Description"></textarea>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="services" class="form-label mb-0 me-3"><strong>Servizi:</strong>:</label>
                        @foreach ($services as $service)
                            <div class="form-check @error('services') is-invalid @enderror">
                                <input value="{{ $service->id }}" class="form-check-input me-1" type="checkbox"
                                    name="services[]">
                                <label class="form-check-label me-3">{{ $service->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="rooms" class="form-label"><strong>Stanze:</strong></label>
                        <input type="number" min="1" class="form-control" name="rooms" id="rooms"
                            placeholder="Add rooms">
                    </div>
                    <div class="mb-3">
                        <label for="bedrooms" class="form-label"><strong>Camere da Letto:</strong></label>
                        <input type="number" min="1" class="form-control" name="bedrooms" id="bedrooms"
                            placeholder="Add bedrooms">
                    </div>
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label"><strong>Bagni:</strong></label>
                        <input type="number" min="1" class="form-control" name="bathrooms" id="bathrooms"
                            placeholder="Add bathrooms">
                    </div>
                    <div class="mb-3">
                        <label for="square_meters" class="form-label"><strong>Metri Quadrati:</strong></label>
                        <input type="number" min="1" class="form-control" name="square_meters" id="square_meters"
                            placeholder="Add square_meters">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Indirizzo:</strong></label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Add address">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </div>
                    <div class="mb-3">
                        <label for="price_per_night" class="form-label"><strong>Prezzo per una Notte:</strong></label>
                        <input type="number" min="1" class="form-control" name="price_per_night"
                            id="price_per_night" placeholder="Add price_per_night">
                    </div>
                    <div class="mb-3">
                        <span><strong>Visibilità:</strong></span>
                        <select class="form-select" name="visibility" id="visibiliti">
                            <option selected value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
