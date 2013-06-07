# BrassDB for Kohana 3.3

## Brass

Brass is an ORM/ActiveRecord like library that takes full advantage of MongoDB's features. Brass supports:
* The latest MongoClient driver for PHP
* Chained calls using Mongo's aggregate framework
* Atomic updates to calculate what values changed, and updating only those values using atomic modifiers like $set, $push/$pull and $inc
* Mongo and BSON datatypes including embedded objects, arrays, enums and (multidimensional) counters
* 
* Form generation for Models
* Relationships from the RDBMS world like has_one, belongs_to, has_many and has_and_belongs_to_many
* Validation of object data, including embedded objects
* Simulated "multiple inheritence" for models
* Similar syntax to users of other ORMs

## BrassDB

A simple wrapper to access MongoDB. Store your database info in a config file and access MongoDB from anywhere in your code using BrassDB::instance().

## CRUD Operations
A look at a simple model (/classes/Models/Brass/Transaction.php) model. In this example you'll see a few additional properties that relate to [annex](https://github.com/thinkclay/KO3-Annex) which is a CMS module for Kohana.. if you're building a CMS, I highly recommend checking out Annex as it will auto build and validate forms for you. If you're looking for JUST the ORM, then ignore the editable, label, and input properties. The properties that are used in Brass:

* Type: one of the [BSON](http://bsonspec.org/) types as used in the [php driver](http://us2.php.net/manual/en/mongo.types.php)
* Kohana Validation fields: (required, min_length, max_length, unique, etc)

  
	```php
	<?php defined('SYSPATH') OR die('No Direct Script Access');

	class Model_Brass_Transaction extends Brass
	{
	
	    public $_fields = [
	        'investor' => [
	            'editable'  => 'admin',
	            'type'      => 'objectid',
	            'label'     => 'Investor',
	            'input'     => 'select',
	            'populate'  => 'Model_Annex_Form::investor_list',
	            'required'  => TRUE,
	        ],
	        'client' => [
	            'type'      => 'objectid',
	            'label'     => 'Client',
	            'input'     => 'select',
	            'populate'  => 'Model_Annex_Form::client_list',
	        ],
	        'created' => [
	            'type'      => 'timestamp',
	            'required'  => TRUE,
	        ],
	        'amount' => [
	            'editable'  => 'admin',
	            'type'      => 'double',
	            'required'  => TRUE
	        ],
	        'method' => [
	            'editable'  => 'admin',
	            'type'      => 'string',
	        ],
	        'type' => [
	            'editable'  => 'admin',
	            'type'      => 'string',
	            'required'  => TRUE
	        ],
	        'status' => [
	            'editable'  => 'admin',
	            'type'      => 'string',
	            'required'  => TRUE
	        ],
	        'description' => [
	            'editable'  => 'admin',
	            'type'      => 'string',
	            'required'  => TRUE
	        ],
	        'signature' => [
	            'editable'  => 'admin',
	            'type'      => 'string'
	        ]
	    ];
	}
	```


Creating a record from a brass_transaction 

  ```php
	$transaction = Brass::factory(
	    'brass_transaction',
	    [
	        'owner'  => '516F8FF5673FAAE898000002'
	        'name'   => 'Initial Deposit',
	        'amount' => 1500.00
	    ]
	)->create();
  ```
	
Retrieving brass_transactions from the database

  ```php
  $transactions = Brass::factory(
	    'brass_transaction',
	    [
	        'owner' => $user->_id
	    ]
	))->load(0);
  ```
	
Creating data with the native Mongo Driver (versus having a defined model):

  ```php
  BrassDB::instance()->insert(
	    'brass_cms',
	    [
	        'page' => 'home',
	        'home' => [
	        'blog' => [
	            'header' => 'Latest Blog Post'
	        ]
	    ]
	);
  ```
