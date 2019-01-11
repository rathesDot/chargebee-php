<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Util;

class ChargeBee_PaymentSource extends ChargeBee_Model
{
    protected $allowed = ['id', 'customerId', 'type', 'referenceId', 'status', 'gateway', 'gatewayAccountId',
        'ipAddress', 'issuingCountry', 'card', 'bankAccount', 'amazonPayment', 'paypal', 'deleted', ];

    // OPERATIONS
    //-----------

    public static function createUsingTempToken($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', 'create_using_temp_token'), $params, $env, $headers);
    }

    public static function createUsingPermanentToken($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', 'create_using_permanent_token'), $params, $env, $headers);
    }

    public static function createCard($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', 'create_card'), $params, $env, $headers);
    }

    public static function createBankAccount($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', 'create_bank_account'), $params, $env, $headers);
    }

    public static function updateCard($id, $params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', $id, 'update_card'), $params, $env, $headers);
    }

    public static function verifyBankAccount($id, $params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', $id, 'verify_bank_account'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, Util::encodeURIPath('payment_sources', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, Util::encodeURIPath('payment_sources'), $params, $env, $headers);
    }

    public static function switchGatewayAccount($id, $params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', $id, 'switch_gateway_account'), $params, $env, $headers);
    }

    public static function exportPaymentSource($id, $params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', $id, 'export_payment_source'), $params, $env, $headers);
    }

    public static function delete($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('payment_sources', $id, 'delete'), [], $env, $headers);
    }
}
