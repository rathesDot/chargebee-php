<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_HostedPage extends Model
{
    protected $allowed = ['id', 'type', 'url', 'state', 'failureReason', 'passThruContent', 'embed', 'createdAt',
        'expiresAt', 'updatedAt', 'resourceVersion', 'checkoutInfo', ];

    public function content()
    {
        if (isset($this->_values['content'])) {
            return new ChargeBee_Content($this->_values['content']);
        }

        return null;
    }

    // OPERATIONS
    //-----------

    public static function checkoutNew($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'checkout_new'), $params, $env, $headers);
    }

    public static function checkoutExisting($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'checkout_existing'), $params, $env, $headers);
    }

    public static function updateCard($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'update_card'), $params, $env, $headers);
    }

    public static function updatePaymentMethod($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'update_payment_method'), $params, $env, $headers);
    }

    public static function managePaymentSources($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'manage_payment_sources'), $params, $env, $headers);
    }

    public static function collectNow($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'collect_now'), $params, $env, $headers);
    }

    public static function extendSubscription($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'extend_subscription'), $params, $env, $headers);
    }

    public static function checkoutGift($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'checkout_gift'), $params, $env, $headers);
    }

    public static function claimGift($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'claim_gift'), $params, $env, $headers);
    }

    public static function retrieveAgreementPdf($params, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', 'retrieve_agreement_pdf'), $params, $env, $headers);
    }

    public static function acknowledge($id, $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('hosted_pages', $id, 'acknowledge'), [], $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('hosted_pages', $id), [], $env, $headers);
    }

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('hosted_pages'), $params, $env, $headers);
    }
}
