<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51QkQxYP6mKPrmPu8YvBPN71gcpY7PJ7i7xWk4lo5RaW5xYk1ZQd4BinFmIXgXtdjwqLYk9JImGmqjV9QY3D0TVPV00PSkhzHd9";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/success.php",
    "cancel_url" => "http://localhost/index.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "gbp",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ],
        [
            "quantity" => 2,
            "price_data" => [
                "currency" => "gbp",
                "unit_amount" => 700,
                "product_data" => [
                    "name" => "Hat"
                ]
            ]
        ]        
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);