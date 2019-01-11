<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Util;

class ChargeBee_Plan extends ChargeBee_Model
{
    protected $allowed = ['id', 'name', 'invoiceName', 'description', 'price', 'currencyCode', 'period',
        'periodUnit', 'trialPeriod', 'trialPeriodUnit', 'pricingModel', 'chargeModel', 'freeQuantity', 'setupCost', 'downgradePenalty', 'status', 'archivedAt', 'billingCycles', 'redirectUrl', 'enabledInHostedPages', 'enabledInPortal', 'addonApplicability', 'taxCode', 'sku', 'accountingCode', 'accountingCategory1', 'accountingCategory2', 'isShippable', 'shippingFrequencyPeriod', 'shippingFrequencyPeriodUnit', 'resourceVersion', 'updatedAt', 'giftable', 'claimUrl', 'invoiceNotes', 'taxable', 'taxProfileId', 'metaData', 'tiers', 'applicableAddons', 'attachedAddons', 'eventBasedAddons', ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('plans'), $params, $env, $headers);
    }

    public static function update($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('plans', $id), $params, $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, Util::encodeURIPath('plans'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, Util::encodeURIPath('plans', $id), [], $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('plans', $id, 'delete'), [], $env, $headers);
    }

    public static function copy($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('plans', 'copy'), $params, $env, $headers);
    }

    public static function unarchive($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('plans', $id, 'unarchive'), [], $env, $headers);
    }
}
