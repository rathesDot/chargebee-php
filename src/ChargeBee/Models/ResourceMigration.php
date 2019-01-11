<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ResourceMigration extends Model
{
    protected $allowed = ['fromSite', 'entityType', 'entityId', 'status', 'errors', 'createdAt', 'updatedAt',
    ];

    // OPERATIONS
    //-----------

    public static function retrieveLatest($params, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('resource_migrations', 'retrieve_latest'), $params, $env, $headers);
    }
}
