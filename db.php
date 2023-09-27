<?php

return [
    'class' => 'yii\db\Connection',
    'driverName' => 'pgsql',
    'dsn' => 'pgsql:host=postgres;dbname=yii2basic',
//    'dsn' => 'pgsql:host=postgres;dbname=yii2basic',
    'username' => 'admin',
    'password' => 'rootpassword',
    'charset' => 'utf8',
//      POSTGRES_DB: yii2basic
//      POSTGRES_USER: admin
//      POSTGRES_PASSWORD: rootpassword  # Задайте пароль, который соответствует db.php
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
