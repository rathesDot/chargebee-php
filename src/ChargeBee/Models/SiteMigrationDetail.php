<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_SiteMigrationDetail extends Model
{
    protected $allowed = ['entityId', 'otherSiteName', 'entityIdAtOtherSite', 'migratedAt', 'entityType',
        'status', ];

    // OPERATIONS
    //-----------

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('site_migration_details'), $params, $env, $headers);
    }
}
