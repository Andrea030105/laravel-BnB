<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(Apartment $apartment)
    {
        return view('admin.stats.stats', compact('apartment'));
    }
}
