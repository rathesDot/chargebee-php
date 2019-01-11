<?php

namespace Chargebee\Chargebee;

class ChargeBee_Request
{
    const GET = 'get';

    const POST = 'post';

    public static function sendListRequest($method, $url, $params = [], $env = null, $headers = [])
    {
        $serialized = [];
        foreach ($params as $k => $v) {
            if (is_array($v)) {
                $v = json_encode($v);
            }
            $serialized[$k] = $v;
        }

        return self::send($method, $url, $serialized, $env, $headers);
    }

    public static function send($method, $url, $params = [], $env = null, $headers = [])
    {
        if (is_null($env)) {
            $env = ChargeBee_Environment::defaultEnv();
        }
        if (is_null($env)) {
            throw new Exception("ChargeBee api environment is not set. Set your site & api key in ChargeBee_Environment::configure('your_site', 'your_api_key')");
        }
        $ser_params = Util::serialize($params);
        $response = ChargeBee_Curl::doRequest($method, $url, $env, $ser_params, $headers);
        if (is_array($response) && array_key_exists('list', $response)) {
            return new ChargeBee_ListResult($response['list'], isset($response['next_offset']) ? $response['next_offset'] : null);
        }

        return new Result($response);
    }
}
