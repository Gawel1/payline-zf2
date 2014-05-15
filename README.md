payline-zf2
=====================================

Based on Payline SDK, Payline-zf2 allows you to use it in a zf2 service. Payline is a way to do credit card payments online.

## Installation ##

This is installable via [Composer](https://getcomposer.org/) as [gawel1/payline-zf2](https://packagist.org/packages/gawel1/payline-zf2).

## Usage ##

### Basic Usage ###

First, Copy the payline.local.php.dist in your application config and set the file with your own configuration.
Then, you can get the payline service with the following code :

```php
$this->getServiceLocator()->get('payline');
```

#### Do a web payment ####

```php
       $uri = $this->getRequest()->getUri();
       $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
       $response = $this->getServiceLocator->get('payline')->doWebPayment([
           'returnURL'    => $base . $this->url()->fromRoute('home'),
            'cancelURL'    => $base . $this->url()->fromRoute('home'),
            'payment'      => [
                'amount'   => 100,
                'action'   => 101,
                'currency' => 978,
                'mode'     => PaylineService::CASH_PAYMENT
            ],
            'order'        => [
                'amount'   => 100,
                'ref'      => 1,
                'currency' => 978
            ]
        ]);
```

### Payline web services informations ###
To see more informations about Payline and the API's, download [this document](https://support.payline.com/hc/fr/articles/201080786-Descriptif-des-appels-webservices-de-la-solution-de-paiement-Payline).

To see more informations about the Payline SDK, download  [this document](http://www.payline.com/images/moduleskitsdocs/kit_integration_php_v1.a.pdf)
