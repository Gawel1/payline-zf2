<?php

namespace Payline\Service;

interface PaylineAwareInterface
{
    public function setClient(\paylineSDK $client);
    public function getClient();
}