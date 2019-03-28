<?php defined('FRTCFTYU') or die('No direct script access.');

return array (
    
    'mysql' => array(
        'db' => array(
            'driver' => 'PDO_MYSQL',
            'DEVELOPMENT' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'smartsystem',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                ),
            'PRODUCTION' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'smartsystem',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                )
        )
    )
);