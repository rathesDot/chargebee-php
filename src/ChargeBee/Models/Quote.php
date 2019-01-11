<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_Quote extends ChargeBee_Model
{
    protected $allowed = ['id', 'poNumber', 'customerId', 'subscriptionId', 'status', 'operationType', 'vatNumber',
        'priceType', 'validTill', 'date', 'subTotal', 'total', 'creditsApplied', 'amountPaid', 'amountDue', 'resourceVersion', 'updatedAt', 'currencyCode', 'lineItems', 'discounts', 'lineItemDiscounts', 'taxes', 'lineItemTaxes', 'shippingAddress', 'billingAddress', ];

    // OPERATIONS
    //-----------

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('quotes', $id), [], $env, $headers);
    }

    public static function createForOnetimeCharges($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('quotes', 'create_for_onetime_charges'), $params, $env, $headers);
    }

    public static function convert($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('quotes', $id, 'convert'), [], $env, $headers);
    }

    public static function updateStatus($id, $params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('quotes', $id, 'update_status'), $params, $env, $headers);
    }

    public static function pdf($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('quotes', $id, 'pdf'), $params, $env, $headers);
    }
}
