<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CustomerContact extends Model
{
    protected $allowed = ['id', 'first_name', 'last_name', 'email', 'phone', 'label', 'enabled', 'send_account_email', 'send_billing_email'];
}
