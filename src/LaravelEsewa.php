<?php

namespace Dipesh79\LaravelEsewa;


class LaravelEsewa
{
    private $merchant_id;

    public function __construct()
    {
        $this->merchant_id = config('esewa.scd');
    }

    public function esewaCheckout($amount=100,$tax_amount=0,$service_charge=0,$delivery_charge=0,$total_amount,$order_id,$su,$fu)
    {
        $esewa_url = "https://uat.esewa.com.np/epay/main/?";
        $data = [
            'amt' => $amount,
            'pdc' => $delivery_charge,
            'psc' => $service_charge,
            'txAmt' => $tax_amount,
            'tAmt' => $total_amount,
            'pid' => $order_id,
            'scd' => $this->merchant_id,
            'su' => $su,
            'fu' => $fu
        ];

        $url = $esewa_url . http_build_query($data);
        return $url;
    }
}