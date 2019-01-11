<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceNote extends Model
{
    protected $allowed = ['entity_type', 'note', 'entity_id'];
}
