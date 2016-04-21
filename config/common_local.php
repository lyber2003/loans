<?php

return [
    'components' => [
        'db' => [
            //'dsn' => 'mysql:host=localhost;dbname=seokeys',
            'dsn' => 'pgsql:host=db-psql;port=5432;dbname=seokeys',
            'username' => 'root',
            'password' => 'root',
            'tablePrefix' => 'keys_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport'=>false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'zadunayyskiyy@gmail.com',
                'password' => 'eeGJlr33kl',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];