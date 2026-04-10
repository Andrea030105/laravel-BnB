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
                <form action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Add Title"
                            value="{{ $apartment->title }}">
                    </div>
                    <div class="mb-3">
                        <div>
                            <img src="{{ asset('storage/' . $apartment->image) }}" class="img-apartment-width my-2"
                                alt="{{ $apartment->title }}">
                        </div>
                        <label for="image" class="form-label"><strong>Inserisci l'immagine</strong>:</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Add Description">{{ $apartment->description }}</textarea>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="services" class="form-label mb-0 me-3"><strong>Servizi</strong>:</label>
                        @foreach ($services as $service)
                            <div class="form-check @error('services') is-invalid @enderror">
                                @if ($errors->any())
                                    <input class="form-check-input me-1" type="checkbox" value="{{ $service->id }}"
                                        name="services[]"
                                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label me-3">{{ $service->name }}</label>
                                @else
                                    <input class="form-check-input me-1" type="checkbox" value="{{ $service->id }}"
                                        name="services[]" {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                                    <label class="form-check-label me-3">{{ $service->name }}</label>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="rooms" class="form-label">Stanze</label>
                        <input type="number" min="1" class="form-control" name="rooms" id="rooms"
                            placeholder="Add rooms" value="{{ $apartment->rooms }}">
                    </div>
                    <div class="mb-3">
                        <label for="bedrooms" class="form-label">Camere da Letto</label>
                        <input type="number" min="1" class="form-control" name="bedrooms" id="bedrooms"
                            placeholder="Add bedrooms" value="{{ $apartment->bedrooms }}">
                    </div>
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Bagni</label>
                        <input type="number" min="1" class="form-control" name="bathrooms" id="bathrooms"
                            placeholder="Add bathrooms" value="{{ $apartment->bathrooms }}">
                    </div>
                    <div class="mb-3">
                        <label for="square_meters" class="form-label">Metri Quadrati</label>
                        <input type="number" min="1" class="form-control" name="square_meters" id="square_meters"
                            placeholder="Add square_meters" value="{{ $apartment->square_meters }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Add address"
                            value="{{ $apartment->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="price_per_night" class="form-label">Prezzo per una Notte</label>
                        <input type="number" min="1" class="form-control" name="price_per_night"
                            id="price_per_night" placeholder="Add price_per_night"
                            value="{{ $apartment->price_per_night }}">
                    </div>
                    <div class="mb-3">
                        <span>Visibilità:</span>
                        <select class="form-select" name="visibility" id="visibiliti">
                            <option {{ $apartment->visibility === 1 ? 'selected' : '' }} value="1">Si</option>
                            <option {{ $apartment->visibility === 0 ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
