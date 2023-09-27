<?php

return [
    'class' => 'yii\db\Connection',
    'driverName' => 'pgsql',
    'dsn' => 'pgsql:host=postgres;dbname=yii2basic',
//    'dsn' => 'pgsql:host=postgres;dbname=yii2basic',
    'username' => 'admin',
    'password' => 'rootpassword',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
