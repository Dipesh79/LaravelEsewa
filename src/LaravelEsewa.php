<?php

namespace Dipesh79\LaravelEsewa;


class LaravelEsewa
{
    private $merchant_id;
    private $url;

    public function __construct()
    {
        $this->merchant_id = config('esewa.scd');
        $this->url = config('esewa.url');
    }

    public function esewaCheckout($amount, $tax_amount = 0, $service_charge = 0, $delivery_charge = 0, $order_id, $su, $fu)
    {
        $esewa_url = $this->url . "?";

        if (!$this->merchant_id)
        {
            throw new \Exception("Please Enter Merchant Id");
        }

        $data = [
            'amt' => $amount,
            'pdc' => $delivery_charge,
            'psc' => $service_charge,
            'txAmt' => $tax_amount,
            'tAmt' => $amount + $delivery_charge + $service_charge + $tax_amount,
            'pid' => $order_id,
            'scd' => $this->merchant_id,
            'su' => $su,
            'fu' => $fu
        ];

        $url = $esewa_url . http_build_query($data);
        return $url;
    }
}
