<?php

return array(
    /**
     * Merchant ID
     *
     * This is the merchant id provided by eSewa.
     */
    'scd' => env('ESEWA_MERCHANT_ID', 'EPAYTEST'),

    /**
     * Base URL
     *
     * As of Feb 18, 2025:
     * For live environment, use https://esewa.com.np/epay/main
     * For Sandbox environment, use https://rc.esewa.com.np/epay/main
     */
    'url' => env('ESEWA_URL', 'https://rc.esewa.com.np/epay/main'),
);
