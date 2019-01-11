<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_PromotionalCredit extends Model
{
    protected $allowed = ['id', 'customerId', 'type', 'amount', 'currencyCode', 'description', 'creditType',
        'reference', 'closingBalance', 'doneBy', 'createdAt', ];

    // OPERATIONS
    //-----------

    public static function add($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('promotional_credits', 'add'), $params, $env, $headers);
    }

    public static function deduct($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('promotional_credits', 'deduct'), $params, $env, $headers);
    }

    public static function set($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('promotional_credits', 'set'), $params, $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('promotional_credits'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('promotional_credits', $id), [], $env, $headers);
    }
}
