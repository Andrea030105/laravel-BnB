<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Apartment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Service;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();

        // Se c'è un'immagine, salva il percorso in $data
        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('uploads', $request->file('image'));
        }

        $data['slug'] = Str::slug($data['title'], '-');

        $newApartment = Apartment::create($data);
        $newApartment->services()->sync($request->input('services', []));


        return redirect()->route('admin.apartments.show', $newApartment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        $apartment->load('services');
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($apartment->image);
            $data['image'] = Storage::disk('public')->put('uploads', $request->file('image'));
        }


        $data['slug'] = Str::slug($data['title'], '-');

        $apartment->update($data);

        $apartment->services()->sync($request->services);

        return redirect()->route('admin.apartments.show', $apartment->id)->with('message', 'Appartamento modificato correttamente!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route(('admin.apartments.index'))->with('message', 'Appartamento cancellato corretamente!!');
    }

    public function geocode(Request $request)
    {
        $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/' . urlencode($request->query('address')) . '.json', [
            'key' => env('TOMTOM_API_KEY'),
        ]);

        $data = $response->json();

        if (empty($data['results'])) {
            return response()->json(['error' => 'Indirizzo non trovato'], 404);
        }

        return response()->json([
            'lat' => $data['results'][0]['position']['lat'],
            'lon' => $data['results'][0]['position']['lon'],
        ]);
    }
}
