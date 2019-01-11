<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_ExportDownload extends Model
{
    protected $allowed = ['download_url', 'valid_till'];
}
