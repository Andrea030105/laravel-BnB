<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id_apartment = $request->apartment;

        $messages = Message::where('apartment_id', $id_apartment)->get();
        return view('admin.messages.index', compact('messages'));
    }
}
