<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CustomerContact extends ChargeBee_Model
{
    protected $allowed = ['id', 'first_name', 'last_name', 'email', 'phone', 'label', 'enabled', 'send_account_email', 'send_billing_email'];
}
