<?php

namespace Payline\Service;

use Payline\Service\PaylineAwareTrait;

class PaylineService implements PaylineAwareInterface
{
    use PaylineAwareTrait;

    public function doWebPayment()
    {
        $this->client->doWebPayment($array);
    }
}