<?php

namespace App\Traits;

trait MoneyFormat {

    public function currencyMoneyFormat($amount, $currency)
    {
        return number_format($amount, 2). " ". $currency;
    }
}
