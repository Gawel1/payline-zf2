<?php

namespace Payline\Service;

use Payline\Service\PaylineAwareTrait;

class PaylineService implements PaylineAwareInterface
{
    use PaylineAwareTrait;

    const CASH_PAYMENT                = 'CPT';
    const DEFERRED_PAYMENT            = 'DIF';
    const SEVERAL_INSTALMENTS_PAYMENT = 'NX';
    const RECURRING_PAYMENT           = 'REC';

    const EURO_CURRENCY               = 978;
    const AMERICAN_DOLLAR_CURRENCY    = 840;
    const SWISS_FRANC_CURRENCY        = 756;
    const POUND_STERLING_CURRENCY     = 826;
    const CANADIAN_DOLLAR_CURRENCY    = 124;

    const AUTHORIZATION               = 100;
    const AUTHORIZATION_VALIDATION    = 101;


    /**
     * Execute web paiment and catch response
     *
     * @param array $params
     *
     * @return \pl_result
     */
    public function doWebPayment(array $params)
    {
        $config = $this->getClient()->getServiceLocator()->get('config');
        $params['contracts'] = $config['payline']['contracts'];
        return $this->getClient()->doWebPayment($params);
    }

    /**
     * Get all the paiement modes of the API
     *
     * @return array
     */
    public static function getPaymentModes()
    {
        return [
            self::CASH_PAYMENT,
            self::DEFERRED_PAYMENT,
            self::SEVERAL_INSTALMENTS_PAYMENT,
            self::RECURRING_PAYMENT
        ];
    }

    /**
     * Get all the currencies
     *
     * @return array
     */
    public static function getCurrencies()
    {
        return [
            self::EURO_CURRENCY,
            self::AMERICAN_DOLLAR_CURRENCY,
            self::SWISS_FRANC_CURRENCY,
            self::POUND_STERLING_CURRENCY,
            self::CANADIAN_DOLLAR_CURRENCY
        ];
    }
    
    /**
     * Get all authorization modes
     * 
     * @return array
     */
    public static function getAuthorizationModes()
    {
        return [
            self::AUTHORIZATION,
            self::AUTHORIZATION_VALIDATION
        ];  
    }
}
