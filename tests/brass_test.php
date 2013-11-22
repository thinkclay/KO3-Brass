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
        $this->assertTrue(is_object(BrassDB::instance()));
    }

    public function test_crud_operations()
    {
        $doc = Brass::factory('Brass_Foo', [
            'string_data' => 'ABC'
        ]);

        // Make sure we can create
        $this->assertTrue(is_object($doc->create()));

        // And retrieve our data
        $this->assertTrue(is_string($doc->string_data));

        // That we can load the former document
        $doc2 = Brass::factory('Brass_Foo', ['_id' => $doc->_id])->load();
        $this->assertTrue($doc2->loaded());

        // And delete it
        $this->assertTrue(is_object($doc2->delete()));
    }

}