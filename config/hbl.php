<?php

$apiKeys = array_merge(
    ...array_map(
        function ($v) {
            list($key, $val) = explode(":", $v);
            return [$key => $val];
        },
        explode(",", env("HBL_API_KEY", "curr:apikey"))
    )
);

return [
    "endpoint" => env("HBL_ENDPOINT", "https://core.demo-paco.2c2p.com/"),
    "encryptionKeyId" => env("HBL_ENCRYPTION_KEY_ID", ""),
    "pacoEncryptionPublicKey" => env("HBL_PACO_ENCRYPTION_PUBLIC_KEY", ""),
    "pacoSigningPublicKey" => env("HBL_PACO_SIGNING_PUBLIC_KEY", ""),
    "merchantSigningPublicKey" => env("HBL_MERCHANT_SIGNING_PUBLIC_KEY", ""),
    "merchantSigningPrivateKey" => env("HBL_MERCHANT_SIGNING_PRIVATE_KEY", ""),
    "merchantDecryptionPublicKey" => env("HBL_MERCHANT_DECRYPTION_PUBLIC_KEY", ""),
    "merchantDecryptionPrivateKey" => env("HBL_MERCHANT_DECRYPTION_PRIVATE_KEY", ""),
    "merchantId" => env("HBL_MERCHANT_ID", "DEMOOFFICE"),
    "apiKeys" => $apiKeys,
    "confirmationURL" => env("HBL_CONFIRMATION_URL", "http://example-confirmation.com"),
    "failedURL" => env("HBL_FAILED_URL", "http://example-failed.com"),
    "cancellationURL" => env("HBL_CANCELLATION_URL", "http://example-cancellation.com"),
    "backendURL" => env("HBL_BACKEND_URL", "http://example-backend.com"),
    "tokenType" => "JWT",
    "JWSAlgorithm" => "PS256",
    "JWEAlgorithm" => "RSA-OAEP",
    "JWEEncrptionAlgorithm" => "A128CBC-HS256",
];
