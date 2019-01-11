<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class SubscriptionChargedEventBasedAddon extends Model
{
    protected $allowed = ['id', 'last_charged_at'];
}
