<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_GiftGifter extends Model
{
    protected $allowed = ['customer_id', 'invoice_id', 'signature', 'note'];
}
