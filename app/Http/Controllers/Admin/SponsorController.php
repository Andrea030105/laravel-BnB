<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Sponsor;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Braintree\Gateway;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sponsors = Sponsor::all();
        $apartment = Apartment::FindOrFail($request->apartment);
        $clientToken = $this->gateway->clientToken()->generate(); // ← token per il form

        return view('admin.sponsors.index', compact('sponsors', 'apartment', 'clientToken'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $apartment = Apartment::findOrFail($request->apartment_id);
        $sponsor   = Sponsor::findOrFail($request->sponsor_id);

        // 1. Esegui la transazione con Braintree
        $result = $this->gateway->transaction()->sale([
            'amount'             => $sponsor->price,        // ← importo da pagare
            'paymentMethodNonce' => $request->payment_method_nonce, // ← token generato dal Drop-in
            'options'            => ['submitForSettlement' => true], // ← addebita subito
        ]);

        // 2. Se il pagamento è andato a buon fine
        if ($result->success) {

            // 3. Salva nella tabella pivot
            $apartment->sponsors()->attach($sponsor->id, [
                'activated_at' => now(),
                'expires_at'   => now()->addHours($sponsor->hours),
            ]);

            return redirect()->route('admin.apartments.index')
                ->with('message', 'Sponsor attivato con successo!');
        }

        // 4. Se il pagamento è fallito
        return back()->with('message', 'Pagamento fallito: ' . $result->message);
    }


    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    private $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId'  => env('BRAINTREE_MERCHANT_ID'),
            'publicKey'   => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey'  => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function payment(Request $request)
    {

        $sponsor     = Sponsor::findOrFail($request->sponsor);
        $apartment   = Apartment::findOrFail($request->apartment);
        $clientToken = $this->gateway->clientToken()->generate();

        return view('admin.sponsors.payment.payment', compact('sponsor', 'apartment', 'clientToken'));
    }
}
