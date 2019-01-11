<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_Event extends ChargeBee_Model
{
    protected $allowed = ['id', 'occurredAt', 'source', 'user', 'webhookStatus', 'webhookFailureReason',
        'webhooks', 'eventType', 'apiVersion', ];

    public function content()
    {
        return new ChargeBee_Content($this->_values['content']);
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
                if (null != $apiVersion && 0 != strcasecmp($apiVersion, ChargeBee_Environment::API_VERSION)) {
                    throw new RuntimeException('API version ['.$apiVersion.'] in response does not match '
                        .'with client library API version ['.strtoupper(ChargeBee_Environment::API_VERSION).']');
                }
            }

            return new ChargeBee_Event($webhookData);
        }

        return null;
    }

    // OPERATIONS
    //-----------

    public static function all($params = [], $env = null, $headers = [])
    {
        return ChargeBee_Request::sendListRequest(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('events'), $params, $env, $headers);
    }

    public static function retrieve($id, $env = null, $headers = [])
    {
        return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath('events', $id), [], $env, $headers);
    }
}
