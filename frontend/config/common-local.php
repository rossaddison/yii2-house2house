<?php
return [
    'language' => 'en-UK',
    'components' => [
        'cache' => [
            'class' => 'yii\\caching\\FileCache',
            'keyPrefix' => 'dp2',
        ],
    ],
    'modules' => [
        'core' => [
            'serverName' => 'localhost',
            'serverPort' => '80',
        ],
    ],
];
