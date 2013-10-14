# BrassDB for Kohana 3.3
[![Build Status](https://drone.io/github.com/thinkclay/KO3-Brass/status.png)](https://drone.io/github.com/thinkclay/KO3-Brass/latest)

Brass is an ORM/ActiveRecord like library that takes full advantage of MongoDB's features. Brass aims to be a really simple wrapper to access MongoDB. Store your database info in a config file and access MongoDB from anywhere in your code using BrassDB::instance() or using defined models with ORM.

You'll see a few additional properties in some of the brass code that relate to [annex](https://github.com/thinkclay/KO3-Annex) which is a CMS module for Kohana. If you're building a CMS, I highly recommend checking out Annex as it will auto build and validate forms for you. If you're looking for JUST the ORM, then ignore the editable, label, and input properties. The properties that are used in Brass:

* **Type**: one of the [BSON](http://bsonspec.org/) types as used in the [php driver](http://us2.php.net/manual/en/mongo.types.php)
* **Kohana Validation**: (required, min_length, max_length, unique, etc)

<br />

**STABILITY**
This module is being used in production on a few medium and large websites. The code is fairly bug free from what has been tested and unit tests are on the way. I would still reserve caution in using this module on production where there is sensitive unencrypted data, however, as very little penetration testing has been done with this code base.

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

## Documentation

* [CRUD Operations](https://github.com/thinkclay/KO3-Brass/wiki/CRUD-Operations)

=======
This module is released under an [MIT opensource license](http://opensource.org/licenses/MIT)
