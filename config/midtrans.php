<?php

use Illuminate\Support\Facades\Facade;

return [

    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sandbox' => env( 'MIDTRANS_IS_SANDBOX', true),
];
