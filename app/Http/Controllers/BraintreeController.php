<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
   
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId'  => config('services.braintree.merchant_id'),
            'publicKey'   => config('services.braintree.public_key'),
            'privateKey'  => config('services.braintree.private_key'),
        ]);
    }

    // Genera un client token per il frontend
    public function generateToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['token' => $clientToken]);
    }

    // Gestisce il pagamento
    public function processPayment(Request $request)
    {
      
    $amount = $request->input('amount');  // L'importo che vuoi addebitare
    $cardNumber = $request->input('cardNumber');
    $expirationDate = $request->input('expirationDate');
    $cvv = $request->input('cvv');

    // Creare un metodo di pagamento usando i dati della carta
    $result = $this->gateway->transaction()->sale([
        'amount' => $amount,
        'creditCard' => [
            'number' => $cardNumber,
            'expirationDate' => $expirationDate,
            'cvv' => $cvv,
        ],
        'options' => [
            'submitForSettlement' => true,
        ],
    ]);

    if ($result->success) {
        return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
    } else {
        return response()->json(['success' => false, 'message' => $result->message]);
    }
}
}

