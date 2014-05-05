<?php

namespace SDK;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class paylineSDKZF2 extends \paylineSDK implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
    /**
     * (non-PHPdoc)
     * @see paylineSDK::writeTrace()
     */
    public function writeTrace($trace)
    {
        if(!isset($this->paylineTrace)){
            $this->paylineTrace = new LogZF2(date('Y-m-d',time()).'.log', $this->getServiceLocator()->get('config')['payline']['log_path']);
        }
        $this->paylineTrace->write($trace);
    }
}