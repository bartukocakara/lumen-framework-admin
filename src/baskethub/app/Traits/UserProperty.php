<?php

namespace App\Traits;

trait UserProperty
{
    public function getCustomerNameAndSurname($customer)
    {
        return ucfirst($customer->firstname ?? config("app.name")). " " .
               ucfirst($customer->lastname ?? __('models.USER_'));
    }
}
