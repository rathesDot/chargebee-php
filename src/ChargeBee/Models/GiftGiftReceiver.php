<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class GiftGiftReceiver extends Model
{
    protected $allowed = ['customer_id', 'subscription_id', 'first_name', 'last_name', 'email'];
}
