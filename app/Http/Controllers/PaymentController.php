<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Hbl;
use App\Http\Services\HomeService;
use App\Http\Controllers\FrontEndController;

class PaymentController extends Controller
{
    public $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index($slug)
    {
        $controller = new FrontEndController($this->homeService);
        $priceDetails = $controller->newTrip($slug)->detail;

        $price = $priceDetails->price - ($priceDetails->discount * $priceDetails->price / 100);
        $orderNo = rand();
        $data = [ // Update this with customer info
            "name" => "Test Name",
            "email" => "example@email.com",
            "product_description" => "Tri[",
            "currency" => "thb",
            "amount" => $price * 100,
        ];

        $hbl = new Hbl("thb"); // Update this once live
        $paymentResponse = $hbl->execute($data, $orderNo);
        $paymentResponse = json_decode($paymentResponse)->response;

        if (!$paymentResponse || !isset($paymentResponse->ApiResponse)) {
            throw new Exception("Something went wrong. Please try again.");
        }

        if (!isset($paymentResponse->Data)) {
            throw new Exception($paymentResponse->ApiResponse->MarketingDescription);
        }

        $isSuccess = $paymentResponse->ApiResponse->ResponseDescription == "Success";
        $paymentPageUrl = $paymentResponse->Data->paymentPage->paymentPageURL;

        if (!$paymentPageUrl) {
            throw new Exception("Something went wrong. Please try again.");
        }

        if (!$isSuccess) {
            throw new Exception($paymentResponse->ApiResponse->MarketingDescription);
        }

        return redirect($paymentPageUrl);
    }
}
