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

    const EURO_SYMBOL                 = '€';
    const DOLLAR_SYMBOL               = '$';
    const SWISS_FRANC_SYMBOL          = 'F';
    const POUND_STERLING_SYMBOL       = '£';

    const AUTHORIZATION               = 100;
    const AUTHORIZATION_VALIDATION    = 101;

    const TRANSACTION_APPROVED        = '00000';

    /**
     * Execute web paiment and catch response
     *
     * @param array $params
     *
     * @return \pl_result
     */
    public function doWebPayment(array $params)
    {
        return $this->getClient()->doWebPayment($params);
    }

    /**
     * Get the payment details with the token of the transaction
     *
     * @param string $token
     *
     * @return array
     */
    public function getWebPaymentDetails($token)
    {
        $config = $this->getClient()->getServiceLocator()->get('config');

        return $this->getClient()->getWebPaymentDetails(['version' => $config['payline']['version'], 'token' => $token]);
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

    /**
     * Get the currencies symbol
     *
     * @return array
     */
    public static function getCurrenciesSymbols()
    {
        return [
            self::EURO_CURRENCY            => self::EURO_SYMBOL,
            self::AMERICAN_DOLLAR_CURRENCY => self::DOLLAR_SYMBOL,
            self::SWISS_FRANC_CURRENCY     => self::SWISS_FRANC_SYMBOL,
            self::POUND_STERLING_CURRENCY  => self::POUND_STERLING_SYMBOL,
            self::CANADIAN_DOLLAR_CURRENCY => self::DOLLAR_SYMBOL
        ];
    }
}
