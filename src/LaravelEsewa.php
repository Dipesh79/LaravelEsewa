<?php

namespace Dipesh79\LaravelEsewa;


class LaravelEsewa
{
    private $merchant_id;
    private $env;

    public function __construct()
    {
        $this->merchant_id = config('esewa.scd');
        $this->env = config('esewa.env');
    }

    public function esewaCheckout($amount, $tax_amount = 0, $service_charge = 0, $delivery_charge = 0, $order_id, $su, $fu)
    {
        if ($this->env == "Sandbox") {
            $esewa_url = "https://uat.esewa.com.np/epay/main/?";
        } elseif ($this->env == "Live") {
            $esewa_url = "https://esewa.com.np/epay/main/?";
        } else {
            return "Please specify environment.";
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
