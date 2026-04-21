<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function send(Request $request)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'name'         => 'required|string|max:30',
            'email'        => 'required|email|max:50',
            'content'      => 'required',
        ]);

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        try {
            Mail::to('BnB@bnbmail.com')->send(new NewContact($new_message));
        } catch (\Exception $e) {
            // il messaggio è salvato nel DB anche se la mail fallisce
            Log::error('Errore invio mail: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Messaggio inviato con successo']);
    }
}
