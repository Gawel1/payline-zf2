<?php
namespace Payline\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Payline\Exception\InvalidArgumentException;

class PaylineInitializer implements InitializerInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\InitializerInterface::initialize()
     */
    public function initialize($instance,ServiceLocatorInterface $serviceLocator)
    {
        if($instance instanceof PaylineAwareInterface) {
            $config = $serviceLocator->get('config');
            if ($this->validParams($config)) {
                $instance->setClient(new \paylineSDKZF2(
                    $config['payline']['merchant_id'],
                    $config['payline']['access_key'],
                    $config['payline']['proxy_host'],
                    $config['payline']['proxy_port'],
                    $config['payline']['proxy_login'],
                    $config['payline']['proxy_password'],
                    $config['payline']['production']
                ));
            }
        }
    }

    /**
     * Validate if required params were written in configuration
     *
     * @param array $params
     *
     * @throws InvalidArgumentException
     *
     * @return boolean
     */
    protected function validParams(array $params)
    {
        if (! isset($params['payline']['merchant_id'])) {
            throw new InvalidArgumentException("You didn't set the merchant id param in config");
            return false;
        }

        if (! isset($params['payline']['access_key'])) {
            throw new InvalidArgumentException("You didn't set the access key param in config");
            return false;
        }

        if (! isset($params['payline']['proxy_host'])) {
            throw new InvalidArgumentException("You didn't set the proxy host param in config");
            return false;
        }

        if (! isset($params['payline']['proxy_port'])) {
            throw new InvalidArgumentException("You didn't set the proxy port param in config");
            return false;
        }

        if (! isset($params['payline']['proxy_login'])) {
            throw new InvalidArgumentException("You didn't set the proxy login param in config");
            return false;
        }

        if (! isset($params['payline']['proxy_password'])) {
            throw new InvalidArgumentException("You didn't set the proxy password param in config");
            return false;
        }

        if (! isset($params['payline']['production'])) {
            throw new InvalidArgumentException("You didn't set the production param in config");
            return false;
        }

        return true;
    }
}