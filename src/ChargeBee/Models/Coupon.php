<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class Coupon extends Model
{
    protected $allowed = ['id', 'name', 'invoiceName', 'discountType', 'discountPercentage', 'discountAmount',
        'discountQuantity', 'currencyCode', 'durationType', 'durationMonth', 'validTill', 'maxRedemptions', 'status', 'applyDiscountOn', 'applyOn', 'planConstraint', 'addonConstraint', 'createdAt', 'archivedAt', 'resourceVersion', 'updatedAt', 'planIds', 'addonIds', 'redemptions', 'invoiceNotes', 'metaData', ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupons'), $params, $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('coupons'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('coupons', $id), [], $env, $headers);
    }

    public static function update($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupons', $id), $params, $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupons', $id, 'delete'), [], $env, $headers);
    }

    public static function copy($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupons', 'copy'), $params, $env, $headers);
    }

    public static function unarchive($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('coupons', $id, 'unarchive'), [], $env, $headers);
    }
}
