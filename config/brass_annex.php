<?php defined('SYSPATH') or die('No direct script access.');

return [
    // Module Information
    'module' => [
        'name'      => 'Brass',
        'overview'  => 'ORM/ODM Layer for Mongo and others',
        'version'   => '0.0.2',
        'url'       =>  [
            'author'    => 'http://thinkclay.com',
        ],

        // create a point release
        // levels: update, feature, security
        'changelog' => [
            '0.0.2' => ['update' => 'Refactor of authentication, and close to a stable release'],
            '0.0.1' => ['update' => 'Initial Development of the Module'],
        ],
    ]
];