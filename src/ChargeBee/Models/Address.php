<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class Address extends Model
{
    protected $allowed = ['label', 'firstName', 'lastName', 'email', 'company', 'phone', 'addr', 'extendedAddr',
        'extendedAddr2', 'city', 'stateCode', 'state', 'country', 'zip', 'validationStatus', 'subscriptionId', ];

    // OPERATIONS
    //-----------

    public static function retrieve($params, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('addresses'), $params, $env, $headers);
    }

    public static function update($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addresses'), $params, $env, $headers);
    }
}
