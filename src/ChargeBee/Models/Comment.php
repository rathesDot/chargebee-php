<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_Comment extends ChargeBee_Model
{
    protected $allowed = ['id', 'entityType', 'addedBy', 'notes', 'createdAt', 'type', 'entityId',
    ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('comments'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('comments', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('comments'), $params, $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('comments', $id, 'delete'), [], $env, $headers);
    }
}
