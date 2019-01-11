<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_SiteMigrationDetail extends ChargeBee_Model
{
    protected $allowed = ['entityId', 'otherSiteName', 'entityIdAtOtherSite', 'migratedAt', 'entityType',
        'status', ];

    // OPERATIONS
    //-----------

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('site_migration_details'), $params, $env, $headers);
    }
}
