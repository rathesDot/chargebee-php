# Chargebee PHP Client Library - API V2

[![Packagist](https://img.shields.io/packagist/v/chargebee/chargebee-php.svg?maxAge=2592000)](https://packagist.org/packages/chargebee/chargebee-php)
[![Packagist](https://img.shields.io/packagist/dt/chargebee/chargebee-php.svg?maxAge=2592000)](https://packagist.org/packages/chargebee/chargebee-php/stats)
[![Packagist](https://img.shields.io/packagist/dm/chargebee/chargebee-php.svg?maxAge=2592000)](https://packagist.org/packages/chargebee/chargebee-php/stats)
[![Packagist](https://img.shields.io/packagist/l/chargebee/chargebee-php.svg?maxAge=2592000)](https://packagist.org/packages/chargebee/chargebee-php)

This is the PHP Library for integrating with Chargebee. Sign up for a Chargebee account [here](https://www.chargebee.com).

Chargebee now supports two API versions - [V1](https://apidocs.chargebee.com/docs/api/v1) and [V2](https://apidocs.chargebee.com/docs/api), of which V2 is the latest release and all future developments will happen in V2. This library is for **API version V2**. If you’re looking for V1, head to [chargebee-v1 branch](https://github.com/chargebee/chargebee-php/tree/chargebee-v1).

## Requirements

This package require a PHP version `> 7.3`.

## Installation

`ChargeBee` is available on [Packagist](https://packagist.org/packages/chargebee/chargebee-php) and can be installed using [Composer](https://getcomposer.org/)

```shell
$ composer require chargebee/chargebee-php:'>=2, &lt;3'
```

or
Download the php library version 2.x.x from https://github.com/chargebee/chargebee-php/tags. Extract the library into the
php include path.

Then, require the library as

```php
require_once(dirname(__FILE__) . 'path_to ChargeBee.php');
```

## Documentation

- [API Reference](https://apidocs.chargebee.com/docs/api?lang=php)

## Usage

To create a new subscription:

```php
require 'ChargeBee.php';

ChargeBee_Environment::configure("your_site", "{your_site_api_key}");

$result = ChargeBee_Subscription::create(array(
  "id" => "__dev__KyVqH3NW3f42fD",
  "planId" => "starter",
  "customer" => array(
    "email" => "john@user.com",
    "firstName" => "John",
    "lastName" => "Wayne"
  )
));

$subscription = $result->subscription();
$customer = $result->customer();
$card = $result->card();
```

## Security

If you discover any security related issues, please use the issue tracker of the GitHub repository.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
