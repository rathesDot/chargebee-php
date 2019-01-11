<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Util;

class ChargeBee_UnbilledCharge extends ChargeBee_Model
{
    protected $allowed = ['id', 'customerId', 'subscriptionId', 'dateFrom', 'dateTo', 'unitAmount', 'pricingModel',
        'quantity', 'amount', 'currencyCode', 'discountAmount', 'description', 'entityType', 'entityId', 'isVoided', 'voidedAt', 'tiers', 'deleted', ];

    // OPERATIONS
    //-----------

    public static function invoiceUnbilledCharges($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('unbilled_charges', 'invoice_unbilled_charges'), $params, $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('unbilled_charges', $id, 'delete'), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, Util::encodeURIPath('unbilled_charges'), $params, $env, $headers);
    }

    public static function invoiceNowEstimate($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('unbilled_charges', 'invoice_now_estimate'), $params, $env, $headers);
    }
}
