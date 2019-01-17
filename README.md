**NOTE: This fork is not production ready. Please use the original repository for bug reports, security issues or feature requests**

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

There are two different ways to use the SDK. On one hand you can use the SDK at full volume with all its predefined models.

But on the other hand, you can use the SDK in its basic way and define the models and entities based on your business logic.

### The Client

Independent on what way you are going, the main entry point of the SDK is the Client.

Initialize your client by providing your site and an API key.

```php
<?php

$client = new \Chargebee\Chargebee($site, $apiKey);
```

> **Note:** The API keys are different for your test site and your live site.

### The `get()` and `post()` methods

Using that client, you can now make GET and POST requests to any of Chargebee's endpoints.

```php
<?php

$client->get('/subscriptions');

$client->post(
  '/customers/8avVGOkx8U1MX/subscriptions',
  [
    'id' => 'some-id',
    'plan_id' => 'basic'
  ]
);
```

The result of these request will always be a `\Chargebee\Response` which implements the PSR-Interface.

## Security

If you discover any security related issues, please use the issue tracker of the GitHub repository.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
