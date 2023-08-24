<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewTripController extends Controller
{
    public function showNewTrip()
    {
        $paymentId = $this->generatePaymentId(); // Replace with your actual payment ID generation logic
        return view('newtrip', ['paymentId' => $paymentId]);
    }

    // Replace this method with your actual payment ID generation logic
    private function generatePaymentId()
    {
        // Your logic to generate a payment ID
        // For example, you can use a timestamp, UUID, or any unique identifier
        return uniqid();
    }
}
