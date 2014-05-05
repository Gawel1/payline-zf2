<?php

namespace SDK;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class paylineSDKZF2 extends \paylineSDK implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    public function __construct($merchant_id, $acess_key, $proxy_host, $proxy_port, $proxy_login, $proxy_password, $production, $sm)
    {
        $this->setServiceLocator($sm);
        parent::__construct($merchant_id, $acess_key, $proxy_host, $proxy_port, $proxy_login, $proxy_password, $production);
    }

    /**
     * (non-PHPdoc)
     * @see paylineSDK::writeTrace()
     */
    public function writeTrace($trace)
    {
        $logPath = null;
        $config  = $this->getServiceLocator()->get('config');

        if (isset($config['payline']['log_path'])) {
            $logPath = $this->getServiceLocator()->get('config')['payline']['log_path'];
        }
        if(!isset($this->paylineTrace)){
            $this->paylineTrace = new LogZF2('payline-' . date('Y-m-d',time()).'.log', $logPath);
        }
        $this->paylineTrace->write($trace);
    }
}