<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Environment;
use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;
use RuntimeException;

class Export extends Model
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
            sleep(Environment::$exportWaitInSecs);
            $this->_values = Export::retrieve($this->id, $env, $headers)->export()->getValues();
            $this->_load();
        }

        return $this;
    }

    // OPERATIONS
    //-----------

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('exports', $id), [], $env, $headers);
    }

    public static function revenueRecognition($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'revenue_recognition'), $params, $env, $headers);
    }

    public static function deferredRevenue($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'deferred_revenue'), $params, $env, $headers);
    }

    public static function plans($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'plans'), $params, $env, $headers);
    }

    public static function addons($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'addons'), $params, $env, $headers);
    }

    public static function coupons($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'coupons'), $params, $env, $headers);
    }

    public static function customers($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'customers'), $params, $env, $headers);
    }

    public static function subscriptions($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'subscriptions'), $params, $env, $headers);
    }

    public static function invoices($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'invoices'), $params, $env, $headers);
    }

    public static function creditNotes($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'credit_notes'), $params, $env, $headers);
    }

    public static function transactions($params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('exports', 'transactions'), $params, $env, $headers);
    }
}
