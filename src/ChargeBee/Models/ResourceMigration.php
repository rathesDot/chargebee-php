<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_ResourceMigration extends ChargeBee_Model
{
    protected $allowed = ['fromSite', 'entityType', 'entityId', 'status', 'errors', 'createdAt', 'updatedAt',
    ];

    // OPERATIONS
    //-----------

    public static function retrieveLatest($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('resource_migrations', 'retrieve_latest'), $params, $env, $headers);
    }
}
