# database-bundle

[![Build Status](https://travis-ci.org/torakel/database-bundle.svg?branch=master)](https://travis-ci.org/torakel/database-bundle)
[![Coverage Status](https://coveralls.io/repos/github/torakel/database-bundle/badge.svg?branch=master)](https://coveralls.io/github/torakel/database-bundle?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/torakel/database-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/torakel/database-bundle/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/torakel/database-bundle/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Latest Stable Version](https://poser.pugx.org/torakel/database-bundle/v/stable)](https://packagist.org/packages/torakel/database-bundle)
[![License](https://poser.pugx.org/torakel/database-bundle/license)](https://packagist.org/packages/torakel/database-bundle)

This is the database bundle for the Torakel project. It contains all the Doctrine Entities and Repositories to store and select the data.

## Install
```bash
composer require torakel/database-bundle 0.2
```

```bash
php bin/console doctrine:database:create
```

```bash
php bin/console doctrine:schema:update --force
```

## Database Schema
There is another repository for the actual database schema of the Torakel project. You don't need the files, since everything is generated from this Bundle, but if you want to understand the relationships within the schema, you might check up the docs of the repository: https://github.com/torakel/database-schema.
