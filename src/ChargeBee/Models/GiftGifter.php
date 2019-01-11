<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_GiftGifter extends ChargeBee_Model
{
    protected $allowed = ['customer_id', 'invoice_id', 'signature', 'note'];
}
