<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Brass Foo Model
 * 
 * Used in Unit Tests
 */
class Model_Brass_Foo extends Brass
{
    public $_fields = [
        'string_data' => [
            'type' => 'string'
        ],
    ];
}