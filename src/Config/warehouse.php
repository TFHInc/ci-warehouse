<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Warehouse Repositories
|--------------------------------------------------------------------------
|
| Set the Warehouse repositories.
|
| Example:
|
|   $config['repositories'] = [
|       'Books' => [
|           'cache' => 'Repositories\Cache\BooksCache',
|           'database' => 'Repositories\Database\BooksDatabase',
|       ]
|   ];
|
*/
$config['repositories'] = [
    'Books' => [
        'cache' => 'Repositories\Cache\BooksCache',
        'database' => 'Repositories\Database\BooksDatabase',
    ]
];