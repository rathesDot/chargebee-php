<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_CreditNote extends ChargeBee_Model
{
    protected $allowed = ['id', 'customerId', 'subscriptionId', 'referenceInvoiceId', 'type', 'reasonCode',
        'status', 'vatNumber', 'date', 'priceType', 'currencyCode', 'total', 'amountAllocated', 'amountRefunded', 'amountAvailable', 'refundedAt', 'voidedAt', 'resourceVersion', 'updatedAt', 'subTotal', 'roundOffAmount', 'lineItems', 'discounts', 'lineItemDiscounts', 'lineItemTiers', 'taxes', 'lineItemTaxes', 'linkedRefunds', 'allocations', 'deleted', ];

    // OPERATIONS
    //-----------

    public static function create($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('credit_notes'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('credit_notes', $id), [], $env, $headers);
    }

    public static function pdf($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('credit_notes', $id, 'pdf'), $params, $env, $headers);
    }

    public static function recordRefund($id, $params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('credit_notes', $id, 'record_refund'), $params, $env, $headers);
    }

    public static function voidCreditNote($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('credit_notes', $id, 'void'), $params, $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('credit_notes'), $params, $env, $headers);
    }

    public static function creditNotesForCustomer($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('customers', $id, 'credit_notes'), $params, $env, $headers);
    }

    public static function delete($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('credit_notes', $id, 'delete'), $params, $env, $headers);
    }
}
