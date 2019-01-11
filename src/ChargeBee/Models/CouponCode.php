<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CouponCode extends ChargeBee_Model
{
    protected $allowed = ['code', 'status', 'couponId', 'couponSetId', 'couponSetName',
    ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('coupon_codes'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('coupon_codes', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('coupon_codes'), $params, $env, $headers);
    }

    public static function archive($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('coupon_codes', $id, 'archive'), [], $env, $headers);
    }
}
