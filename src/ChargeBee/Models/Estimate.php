<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class Estimate extends Model
{
    protected $allowed = ['createdAt', 'subscriptionEstimate', 'invoiceEstimate', 'invoiceEstimates', 'nextInvoiceEstimate',
        'creditNoteEstimates', 'unbilledChargeEstimates', ];

    // OPERATIONS
    //-----------

    public static function createSubscription($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('estimates', 'create_subscription'), $params, $env, $headers);
    }

    public static function createSubForCustomerEstimate($id, $params, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('customers', $id, 'create_subscription_estimate'), $params, $env, $headers);
    }

    public static function updateSubscription($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('estimates', 'update_subscription'), $params, $env, $headers);
    }

    public static function renewalEstimate($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('subscriptions', $id, 'renewal_estimate'), $params, $env, $headers);
    }

    public static function upcomingInvoicesEstimate($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('customers', $id, 'upcoming_invoices_estimate'), [], $env, $headers);
    }

    public static function changeTermEnd($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('subscriptions', $id, 'change_term_end_estimate'), $params, $env, $headers);
    }

    public static function cancelSubscription($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('subscriptions', $id, 'cancel_subscription_estimate'), $params, $env, $headers);
    }

    public static function pauseSubscription($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('subscriptions', $id, 'pause_subscription_estimate'), $params, $env, $headers);
    }

    public static function resumeSubscription($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('subscriptions', $id, 'resume_subscription_estimate'), $params, $env, $headers);
    }
}
