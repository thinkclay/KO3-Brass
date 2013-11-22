<?php defined('SYSPATH') OR die('No direct script access.');

return [
    // Module Information
    'module' => [
        'name'      => 'Brass',
        'overview'  => 'ORM/ODM Layer for Mongo and others',
        'version'   => '0.0.5',
        'url'       =>  [
            'author'    => 'http://thinkclay.com',
        ],

        // create a point release
        // levels: update, feature, security, patch
        'changelog' => [
            '0.0.5' => ['update'    => 'Updates to some core methods'],
            '0.0.4' => ['patch'     => 'Old git conflict was never cleaned out, and unit tests added'],
            '0.0.3' => ['security'  => 'Form fields check a proper authorization::allowed'],
            '0.0.2' => ['security'  => 'Refactor of authentication, and close to a stable release'],
            '0.0.1' => ['update'    => 'Initial Development of the Module'],
        ],
    ]
];