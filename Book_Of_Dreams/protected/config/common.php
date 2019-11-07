<?php
/**
 * This file provides to overwrite the default HumHub / Yii configuration by your local common (Console and Web) environments
 * @see http://www.yiiframework.com/doc-2.0/guide-concept-configurations.html
 * @see http://docs.humhub.org/admin-installation-configuration.html
 * @see http://docs.humhub.org/dev-environment.html
 */
return [
    'components' => [
    'redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => 'localhost',
        'port' => 6379,
        'database' => 0,
    ],
    'queue' => [
        'class' => 'humhub\modules\queue\driver\Redis',
    ],
    'cron' => [
    'class' => 'humhub\modules\queue\driver\Redis',
    ],
    'urlManager' => [
    'showScriptName' => false,
    'enablePrettyUrl' => true,
    ],
    ]
];
