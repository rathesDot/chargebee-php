<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class Contact extends Model
{
    protected $allowed = ['id', 'firstName', 'lastName', 'email', 'phone', 'label', 'enabled', 'sendAccountEmail',
        'sendBillingEmail', ];

    // OPERATIONS
  //-----------
}
