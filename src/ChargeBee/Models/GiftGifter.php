<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class GiftGifter extends Model
{
    protected $allowed = ['customer_id', 'invoice_id', 'signature', 'note'];
}
