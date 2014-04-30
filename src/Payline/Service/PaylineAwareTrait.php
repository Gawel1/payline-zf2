<?php

namespace Payline\Service;

trait PaylineAwareTrait
{
    /**
     * @var \paylineSDK
     */
    protected $client;

    /**
     * Getting the payline client
     *
     * @return \paylineSDK
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Setting the payline client
     *
     * @param \paylineSDK $client
     *
     * @return \Payline\Service\PaylineAwareInterface
     */
    public function setClient(\paylineSDK $client)
    {
        $this->client = $client;

        return $this;
    }
}