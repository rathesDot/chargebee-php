<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_PortalSessionLinkedCustomer extends Model
{
    protected $allowed = ['customer_id', 'email', 'has_billing_address', 'has_payment_method', 'has_active_subscription'];
}
