<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Apartment;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Service;

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
        $apartment->update($request->validated());

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
}
