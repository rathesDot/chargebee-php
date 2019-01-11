<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_PortalSessionLinkedCustomer extends ChargeBee_Model
{
    protected $allowed = ['customer_id', 'email', 'has_billing_address', 'has_payment_method', 'has_active_subscription'];
}
