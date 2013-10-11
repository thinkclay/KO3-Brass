<?php defined('SYSPATH') OR die('No direct script access.');

class Brass_Test extends Unittest_TestCase
{
    /**
     * Tests that Brass will Run
     *
     * @return null
     */
    public function test_mongo_connection()
    {
        // Do we have all our classes?
        $this->assertTrue(class_exists('MongoClient'));
        $this->assertTrue(class_exists('Brass'));
        $this->assertTrue(class_exists('BrassDB'));

        // Is the driver working? Can we connect to the DB?
        $this->assertTrue(BrassDB::instance()->connected());
        $this->assertTrue(is_object(Brass::factory('Brass_User')));
        $this->assertTrue(isset(Brass::factory('Brass_User')->_fields));
    }

}