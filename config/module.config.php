<?php
use Payline\Service\PaylineAwareInterface;

return [
    'service_manager' => [
        'invokables' => [
            'Payline\Service\Payline' => 'Payline\Service\Payline'
        ],
        'aliases' => [
            'payline' => 'Payline\Service\Payline'
        ],
        'initializers' => [
            function ($instance, $sm) {
                if($instance instanceof PaylineAwareInterface) {
                    $instance->setClient(new \paylineSDK());
                }
            }
        ]
    ]
];