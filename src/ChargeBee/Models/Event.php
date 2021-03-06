<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Environment;
use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;
use RuntimeException;

class Event extends Model
{
    protected $allowed = ['id', 'occurredAt', 'source', 'user', 'webhookStatus', 'webhookFailureReason',
        'webhooks', 'eventType', 'apiVersion', ];

    public function content()
    {
        return new Content($this->_values['content']);
    }

    public static function deserialize($json)
    {
        $webhookData = json_decode($json, true);
        if (!$webhookData) {
            throw new Exception('Response not in JSON format. Might not be a ChargeBee webhook call.');
        }
        if (null != $webhookData) {
            if (isset($webhookData['api_version'])) {
                $apiVersion = strtoupper($webhookData['api_version']);
                if (null != $apiVersion && 0 != strcasecmp($apiVersion, Environment::API_VERSION)) {
                    throw new RuntimeException('API version ['.$apiVersion.'] in response does not match '
                        .'with client library API version ['.strtoupper(Environment::API_VERSION).']');
                }
            }

            return new Event($webhookData);
        }

        return null;
    }

    // OPERATIONS
    //-----------

    public static function all($params = [], $env = null, $headers = [])
    {
        return Request::sendListRequest(Request::GET, Util::encodeURIPath('events'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('events', $id), [], $env, $headers);
    }
}
