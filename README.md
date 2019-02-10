**NOTE: This repository is not production ready. Please use the [original repository](https://github.com/chargebee/chargebee-php) for bug reports, security issues or feature requests**

# Chargebee PHP SDK

This package supports you integrating your PHP application with the [API of Chargebee](https://apidocs.chargebee.com/docs/api).

## Requirements

This package requires a PHP version `> 7.3`.

## Installation

The package is not published on packagist yet, so if you want to use this project add this repository manually to your `composer.json`

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/rathesDot/chargebee-php"
        }
    ],
    "require": {
        "rathesDot/chargebee-php": "dev-master"
    }
}
```

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

## The SDK

In addition to the basic client, this repository also provides a version with a set of all models that are accessible via the Chargebee API. So instead of just calling the API endpoints and working with arrays, you can also choose to work with a set of helper methods to build you requests.

For example, if you want to call the `/subscriptions` endpoint you can either do it via the client, or you can use the Request Builder that we call the SDK.

```php
<?php

$client = new \Chargebee\Chargebee($site, $apiKey);

$sdk = new \Chargebee\SDK($client);
```

You can also use the factory method to let the SDK create the client.

```php
<?php

$sdk = \Chargebee\SDK::create($site, $apiKey);
```

Using that SDK you now have access to a `subscription` property that you can use to call endpoints of the entity, in our example listing all subscriptions:

```php
<?php

$sdk->subscriptions
    ->list();
```

You can even add constraints to the request by adding them to the chain


```php
<?php

$response = $sdk->subscriptions
    ->limit(5)
    ->where('plan_id', 'is_not', 'basic')
    ->where('status', 'is', 'active')
    ->list();
```

The response will now be an array, the same as you would call the `get()` method on the client.

## Security

If you discover any security related issues, please use the issue tracker of the GitHub repository.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
