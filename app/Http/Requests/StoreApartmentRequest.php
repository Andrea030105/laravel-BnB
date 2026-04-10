<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'           => ['required', 'string', 'max:100'],
            'description'     => ['nullable', 'string'],
            'rooms'           => ['required', 'integer', 'min:1'],
            'bathrooms'       => ['required', 'integer', 'min:1'],
            'bedrooms'        => ['required', 'integer', 'min:1'],
            'square_meters'   => ['required', 'integer', 'min:1'],
            'address'         => ['required', 'string', 'max:100'],
            'latitude'        => ['nullable', 'numeric', 'between:-90,90'],
            'longitude'       => ['nullable', 'numeric', 'between:-180,180'],
            'image'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'visibility'      => ['boolean'],
            'services'        => ['nullable', 'array'],
            'services.*'      => ['exists:services,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'           => 'Il titolo è obbligatorio.',
            'title.max'                => 'Il titolo non può superare i 100 caratteri.',

            'description.string'       => 'La descrizione deve essere testo.',

            'rooms.required'           => 'Il numero di stanze è obbligatorio.',
            'rooms.integer'            => 'Il numero di stanze deve essere un numero intero.',
            'rooms.min'                => 'Il numero di stanze deve essere almeno 1.',

            'bathrooms.required'       => 'Il numero di bagni è obbligatorio.',
            'bathrooms.integer'        => 'Il numero di bagni deve essere un numero intero.',
            'bathrooms.min'            => 'Il numero di bagni deve essere almeno 1.',

            'bedrooms.required'        => 'Il numero di letti è obbligatorio.',
            'bedrooms.integer'         => 'Il numero di letti deve essere un numero intero.',
            'bedrooms.min'             => 'Il numero di letti deve essere almeno 1.',

            'square_meters.required'   => 'I metri quadrati sono obbligatori.',
            'square_meters.integer'    => 'I metri quadrati devono essere un numero intero.',
            'square_meters.min'        => 'I metri quadrati devono essere almeno 1.',

            'address.required'         => 'L\'indirizzo è obbligatorio.',
            'address.max'              => 'L\'indirizzo non può superare i 100 caratteri.',

            'latitude.numeric'         => 'La latitudine deve essere un numero.',
            'latitude.between'         => 'La latitudine deve essere compresa tra -90 e 90.',

            'longitude.numeric'        => 'La longitudine deve essere un numero.',
            'longitude.between'        => 'La longitudine deve essere compresa tra -180 e 180.',

            'image.image'              => 'Il file caricato deve essere un\'immagine.',
            'image.mimes'              => 'L\'immagine deve essere in formato jpeg, png, jpg o webp.',
            'image.max'                => 'L\'immagine non può superare i 2MB.',

            'price_per_night.required' => 'Il prezzo per notte è obbligatorio.',
            'price_per_night.numeric'  => 'Il prezzo per notte deve essere un numero.',
            'price_per_night.min'      => 'Il prezzo per notte non può essere negativo.',

            'services.array'           => 'I servizi devono essere una lista.',
            'services.*.exists'        => 'Uno o più servizi selezionati non sono validi.',
        ];
    }
}
