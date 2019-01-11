<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Util;

class ChargeBee_Export extends ChargeBee_Model
{
    protected $allowed = ['id', 'operationType', 'mimeType', 'status', 'createdAt', 'download',
    ];

    public function waitForExportCompletion($env = null, $headers = [])
    {
        $count = 0;
        while ('in_process' == $this->status) {
            if ($count++ > 50) {
                throw new RuntimeException('Export is taking too long');
            }
            sleep(ChargeBee_Environment::$exportWaitInSecs);
            $this->_values = ChargeBee_Export::retrieve($this->id, $env, $headers)->export()->getValues();
            $this->_load();
        }

        return $this;
    }

    // OPERATIONS
    //-----------

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, Util::encodeURIPath('exports', $id), [], $env, $headers);
    }

    public static function revenueRecognition($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'revenue_recognition'), $params, $env, $headers);
    }

    public static function deferredRevenue($params, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'deferred_revenue'), $params, $env, $headers);
    }

    public static function plans($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'plans'), $params, $env, $headers);
    }

    public static function addons($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'addons'), $params, $env, $headers);
    }

    public static function coupons($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'coupons'), $params, $env, $headers);
    }

    public static function customers($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'customers'), $params, $env, $headers);
    }

    public static function subscriptions($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'subscriptions'), $params, $env, $headers);
    }

    public static function invoices($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'invoices'), $params, $env, $headers);
    }

    public static function creditNotes($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'credit_notes'), $params, $env, $headers);
    }

    public static function transactions($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::POST, Util::encodeURIPath('exports', 'transactions'), $params, $env, $headers);
    }
}
