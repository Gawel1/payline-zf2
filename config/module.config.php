<?php
use Payline\Service\PaylineAwareInterface;
use Payline\Exception\InvalidArgumentException;

return [
    'service_manager' => [
        'invokables' => [
            'Payline\Service\Payline' => 'Payline\Service\PaylineService'
        ],
        'aliases' => [
            'payline' => 'Payline\Service\Payline'
        ],
        'initializers' => [
            'Payline\Service\PaylineInitializer'
        ]
    ]
];
