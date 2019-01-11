<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_CouponCode extends ChargeBee_Model
{
    protected $allowed = ['code', 'status', 'couponId', 'couponSetId', 'couponSetName',
    ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupon_codes'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('coupon_codes', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('coupon_codes'), $params, $env, $headers);
    }

    public static function archive($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupon_codes', $id, 'archive'), [], $env, $headers);
    }
}
