<?php return array (
  'components' => 
  array (
    'db' => 
    array (
      'class' => 'yii\\db\\Connection',
      'dsn' => 'mysql:host=localhost;dbname=humhub',
      'username' => 'root',
      'password' => 'root',
    ),
    'user' => 
    array (
    ),
    'mailer' => 
    array (
      'transport' => 
      array (
        'class' => 'Swift_MailTransport',
      ),
    ),
    'cache' => 
    array (
      'class' => 'yii\\redis\\Cache',
      'keyPrefix' => 'humhub',
    ),
    'formatter' => 
    array (
      'defaultTimeZone' => 'UTC',
    ),
    'formatterApp' => 
    array (
      'defaultTimeZone' => 'UTC',
      'timeZone' => 'UTC',
    ),
  ),
  'params' => 
  array (
    'installer' => 
    array (
      'db' => 
      array (
        'installer_hostname' => 'localhost',
        'installer_database' => 'humhub',
      ),
    ),
    'config_created_at' => 1572279422,
    'horImageScrollOnMobile' => '1',
    'databaseInstalled' => false,
    'installed' => false,
  ),
  'name' => 'Book Of Dreams',
  'language' => 'fr',
  'timeZone' => 'UTC',
); ?>
