<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Util;

class ChargeBee_Address extends ChargeBee_Model
{
    protected $allowed = ['label', 'firstName', 'lastName', 'email', 'company', 'phone', 'addr', 'extendedAddr',
        'extendedAddr2', 'city', 'stateCode', 'state', 'country', 'zip', 'validationStatus', 'subscriptionId', ];

    // OPERATIONS
    //-----------

    public static function retrieve($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, Util::encodeURIPath('addresses'), $params, $env, $headers);
    }

    public static function update($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('addresses'), $params, $env, $headers);
    }
}
