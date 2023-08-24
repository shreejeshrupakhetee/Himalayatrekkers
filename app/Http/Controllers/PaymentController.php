<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class PaymentController extends Controller
{
    public function index()
    {
        $encryptionKeyId = env('HBL_ENCRYPTION_KEY_ID');
        $pacoEncryptionPublicKey = env('HBL_PACO_ENCRYPTION_PUBLIC_KEY');
        $pacoSigningPublicKey = env('HBL_PACO_SIGNING_PUBLIC_KEY');

        $payload = [
            'amount' => 100,
            'currency' => 'NPR',
            'merchantId' => 123456,
            'invoiceNo' => '1234567890',
            'productDesc' => 'Test payment',
        ];

        $encryptedPayload = encryptPayload($payload, $encryptionKeyId, $pacoEncryptionPublicKey);

        $response = Http::post('https://ecommerce.himalayanbank.com/payment/api/v1/initiate', [
            'encryptedPayload' => $encryptedPayload,
        ]);

        if ($response->status() == 200) {
            $data = json_decode($response->body(), true);

            return view('hbl.payment', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back()->with('error', $response->body());
        }
    }

    public function payment()
    {
        $data = request()->all();

        $decryptedPayload = decryptPayload($data['encryptedPayload'], $encryptionKeyId, $pacoSigningPublicKey);

        if ($decryptedPayload['status'] == 'APPROVED') {
            return redirect()->route('success');
        } else {
            return redirect()->route('failed');
        }
    }

    private function encryptPayload($payload, $encryptionKeyId, $pacoEncryptionPublicKey)
    {
        $pacoRequest = [
            'encryptionKeyId' => $encryptionKeyId,
            'payload' => $payload,
        ];

        $pacoRequestJson = json_encode($pacoRequest);
        $pacoRequestEncrypted = encrypt($pacoRequestJson, $pacoEncryptionPublicKey);

        return $pacoRequestEncrypted;
    }

    private function decryptPayload($encryptedPayload, $encryptionKeyId, $pacoSigningPublicKey)
    {
        $pacoRequest = decrypt($encryptedPayload, $pacoSigningPublicKey);
        $pacoRequestJson = json_decode($pacoRequest, true);

        if ($pacoRequestJson['encryptionKeyId'] != $encryptionKeyId) {
            throw new Exception('Invalid encryption key ID');
        }

        return $pacoRequestJson['payload'];
    }
}
