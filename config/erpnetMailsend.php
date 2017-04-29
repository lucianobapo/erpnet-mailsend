<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 29/04/17
 * Time: 02:02
 */

return [
    'connections' => [
        'mysql-mailsend' => [
            'driver' => 'mysql',
            'host' => env('MAILSEND_DB_HOST', '127.0.0.1'),
            'port' => env('MAILSEND_DB_PORT', '3306'),
            'database' => env('MAILSEND_DB_DATABASE', 'forge'),
            'username' => env('MAILSEND_DB_USERNAME', 'forge'),
            'password' => env('MAILSEND_DB_PASSWORD', ''),
            'unix_socket' => env('MAILSEND_DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],

];