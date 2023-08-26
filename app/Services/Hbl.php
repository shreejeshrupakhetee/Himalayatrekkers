<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use App\Services\Contracts\HblAbstractRequest;

class Hbl extends HblAbstractRequest
{
    public function execute($data, $orderNo = false): string
    {
        $now = Carbon::now();

        if (!$orderNo) {
            $orderNo = $now->getPreciseTimestamp(3);
        }
        $amount = $data["amount"] * 100;
        $apiKeys = config("hbl.apiKeys");

        if (!isset($apiKeys[$this->currency])) {
            throw new Exception("API key not found for: " . strtoupper($this->currency));
        }

        $apiKey = $apiKeys[$this->currency];

        $request =  [
            "apiRequest" => [
                "requestMessageID" => $this->Guid(),
                "requestDateTime" => $now->utc()->format("Y-m-d\TH:i:s.v\Z"),
                "language" => "en-US",
            ],
            "officeId" => config("hbl.merchantId"),
            "orderNo" => $orderNo,
            "productDescription" => $data["product_description"],
            "paymentType" => "CC-VI",
            "preferredPaymentTypes" => [
                "CC",
                "IPP"
            ],
            "mcpFlag" => "N",
            "transactionAmount" => [
                "amountText" => str_pad($amount, 12, "0", STR_PAD_LEFT),
                "currencyCode" => strtoupper($this->currency),
                "decimalPlaces" => 2,
                "amount" => $amount / 100
            ],
            "notificationURLs" => [
                "confirmationURL" => config("hbl.confirmationURL"),
                "failedURL" => config("hbl.failedURL"),
                "cancellationURL" => config("hbl.cancellationURL"),
                "backendURL" => config("hbl.backendURL"),
            ]
        ];

        $payload = [
            "request" => $request,
            "iss" => $apiKey,
            "aud" => "PacoAudience",
            "CompanyApiKey" => $apiKey,
            "iat" => $now->unix(),
            "nbf" => $now->unix(),
            "exp" => $now->addHour()->unix(),
        ];

        $stringPayload = json_encode($payload);
        $signingKey = $this->GetPrivateKey(config("hbl.merchantSigningPrivateKey"));
        $encryptingKey = $this->GetPublicKey(config("hbl.pacoEncryptionPublicKey"));

        $body = $this->EncryptPayload($stringPayload, $signingKey, $encryptingKey);

        try {
            $response = $this->client->post("api/1.0/Payment/prePaymentUi", [
                "headers" => [
                    "Accept" => "application/jose",
                    "CompanyApiKey" => $apiKey,
                    "Content-Type" => "application/jose; charset=utf-8"
                ],
                "body" => $body
            ]);

            $token = $response->getBody()->getContents();
        } catch (RequestException $exception) {
            if (!$exception->hasResponse() || $exception->getCode() >= 500) {
                throw $exception;
            }

            $token = $exception->getResponse()->getBody();
        } catch (Exception $exception) {
            throw $exception;
        }

        return $this->decryptResponse($token);
    }

    public function decryptResponse($content)
    {
        $decryptingKey = $this->GetPrivateKey(config("hbl.merchantDecryptionPrivateKey"));
        $signatureVerificationKey = $this->GetPublicKey(config("hbl.pacoSigningPublicKey"));

        return $this->DecryptToken($content, $decryptingKey, $signatureVerificationKey);
    }
}
