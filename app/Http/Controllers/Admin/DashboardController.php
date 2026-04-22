<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $apartmentsCount = Apartment::where('user_id', $userId)->count();

        $messagesCount = Message::whereHas('apartment', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->count();

        // ✅ somma la colonna views direttamente
        $totalViews = Apartment::where('user_id', $userId)->sum('views');

        return view('admin.dashboard', compact('apartmentsCount', 'messagesCount', 'totalViews'));
    }
}
