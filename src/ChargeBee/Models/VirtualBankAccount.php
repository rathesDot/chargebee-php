<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_VirtualBankAccount extends ChargeBee_Model
{
    protected $allowed = ['id', 'customerId', 'email', 'bankName', 'accountNumber', 'routingNumber', 'swiftCode',
        'gateway', 'gatewayAccountId', 'referenceId', 'deleted', ];

    // OPERATIONS
    //-----------

    public static function createUsingPermanentToken($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('virtual_bank_accounts', 'create_using_permanent_token'), $params, $env, $headers);
    }

    public static function create($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath('virtual_bank_accounts'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('virtual_bank_accounts', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('virtual_bank_accounts'), $params, $env, $headers);
    }
}
