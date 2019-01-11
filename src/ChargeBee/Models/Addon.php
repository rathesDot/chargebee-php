<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_Addon extends Model
{
    protected $allowed = ['id', 'name', 'invoiceName', 'description', 'pricingModel', 'type', 'chargeType',
        'price', 'currencyCode', 'period', 'periodUnit', 'unit', 'status', 'archivedAt', 'enabledInPortal', 'taxCode', 'sku', 'accountingCode', 'accountingCategory1', 'accountingCategory2', 'isShippable', 'shippingFrequencyPeriod', 'shippingFrequencyPeriodUnit', 'resourceVersion', 'updatedAt', 'invoiceNotes', 'taxable', 'taxProfileId', 'metaData', 'tiers', ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addons'), $params, $env, $headers);
    }

    public static function update($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addons', $id), $params, $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('addons'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('addons', $id), [], $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addons', $id, 'delete'), [], $env, $headers);
    }

    public static function copy($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addons', 'copy'), $params, $env, $headers);
    }

    public static function unarchive($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('addons', $id, 'unarchive'), [], $env, $headers);
    }
}
