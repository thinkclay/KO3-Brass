# BrassDB for Kohana 3.3
Brass is an ORM/ActiveRecord like library that takes full advantage of MongoDB's features. Brass aims to be a really simple wrapper to access MongoDB. Store your database info in a config file and access MongoDB from anywhere in your code using BrassDB::instance() or using defined models with ORM.

You'll see a few additional properties in some of the brass code that relate to [annex](https://github.com/thinkclay/KO3-Annex) which is a CMS module for Kohana. If you're building a CMS, I highly recommend checking out Annex as it will auto build and validate forms for you. If you're looking for JUST the ORM, then ignore the editable, label, and input properties. The properties that are used in Brass:

* **Type**: one of the [BSON](http://bsonspec.org/) types as used in the [php driver](http://us2.php.net/manual/en/mongo.types.php)
* **Kohana Validation**: (required, min_length, max_length, unique, etc)

<br />

**FEATURES**
* The latest MongoClient driver for PHP
* Chained calls using Mongo's aggregate framework
* Atomic updates to calculate what values changed, and updating only those values using atomic modifiers like $set, $push/$pull and $inc
* Mongo and BSON datatypes including embedded objects, arrays, enums and (multidimensional) counters
* Form generation for Models
* Relationships from the RDBMS world like has_one, belongs_to, has_many and has_and_belongs_to_many
* Validation of object data, including embedded objects
* Simulated "multiple inheritence" for models
* Similar syntax to users of other ORMs


<br />

## CRUD Operations
A look at a simple model that we would store in <code>/classes/Models/Brass/Transaction.php</code>

```php
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

### Create

```php
// Creating data with the native Mongo Driver
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

// With a defined Brass model
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

When writing complex queries you can either use call() on the brass instance, or you can use the native PHP driver:

```php
BrassDB::instance()->find(
	'brass_users', 
	['account_id' => ['$exists' => FALSE]]
); 
```

### Updating
```php
// With the mongo driver, update(collection, criteria, new data)
BrassDB::instance()->update(
	'brass_users',
	[
		'_id' => $u['_id']
	],
	[
		'$set' => [
			'account_id' => '1000-10-0000'
		]
	]
);
```


This module is released under an [MIT opensource license](http://opensource.org/licenses/MIT)

----
## The MIT License (MIT)

### Copyright (c) 2013 Clay McIlrath

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
