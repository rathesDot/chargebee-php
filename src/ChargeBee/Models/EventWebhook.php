<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class EventWebhook extends Model
{
    protected $allowed = ['id', 'webhook_status'];
}
