<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with(['services', 'sponsors'])->where('visibility', 1)->get();
        return response()->json([
            'success' => true,
            'apartments' => $apartments,
        ]);
    }
    public function show($slug)
    {
        $apartment = Apartment::with(['services', 'sponsors'])->where('slug', $slug)->first();
        if ($apartment) {
            return response()->json([
                'success' => true,
                'apartment' => $apartment,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun Appartamento trovato!!',
            ]);
        }
    }
    public function incrementViews(Apartment $apartment)
    {
        $apartment->increment('views');

        return response()->json(['views' => $apartment->views]);
    }
}
