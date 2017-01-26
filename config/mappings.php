<?php

use Ramsey\Uuid\Doctrine\UuidGenerator;

return [
    'App\Domain\User\User' => [
        'type'   => 'entity',
        'table'  => 'users',
        'id'     => [
            'id' => [
                'type'     => 'uuid',
                'generator' => [
                    'strategy' => 'custom'
                ],
                'customIdGenerator' => [
                    'class' => UuidGenerator::class
                ]
            ],
        ],
        'fields' => [
            'name' => [
                'type' => 'string'
            ],
            'password' => [
                'type' => 'string'
            ],
            'info' => [
                'type' => 'string'
            ]
        ]
    ]
];