<?php

defined('APP_PATH') || define('APP_PATH', realpath('/var/www/web/sacfinanzas/htdocs/sac-finanzas/application'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'sacfinanzas.mysql.eu1.frbit.com',
        'username'    => 'sacfinanzas',
        'password'    => 'NOf7qVepngB-YR4jnlWp8zcQ',
        'dbname'      => 'sacfinanzas',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'baseUri'        => '',
    )
));
