<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_Card extends ChargeBee_Model
{
    protected $allowed = ['paymentSourceId', 'status', 'gateway', 'gatewayAccountId', 'firstName', 'lastName',
        'iin', 'last4', 'cardType', 'fundingType', 'expiryMonth', 'expiryYear', 'issuingCountry', 'billingAddr1', 'billingAddr2', 'billingCity', 'billingStateCode', 'billingState', 'billingCountry', 'billingZip', 'ipAddress', 'customerId', 'maskedNumber', ];

    // OPERATIONS
    //-----------

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('cards', $id), [], $env, $headers);
    }

    public static function updateCardForCustomer($id, $params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('customers', $id, 'credit_card'), $params, $env, $headers);
    }

    public static function switchGatewayForCustomer($id, $params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('customers', $id, 'switch_gateway'), $params, $env, $headers);
    }

    public static function copyCardForCustomer($id, $params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('customers', $id, 'copy_card'), $params, $env, $headers);
    }

    public static function deleteCardForCustomer($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('customers', $id, 'delete_card'), [], $env, $headers);
    }
}
