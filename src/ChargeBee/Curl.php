<?php

namespace Chargebee\Chargebee;

class ChargeBee_Curl
{
    public static function utf8($value)
    {
        if (is_string($value)) {
            return utf8_encode($value);
        }

        return $value;
    }

    public static function doRequest($meth, $url, $env, $params = [], $headers = [])
    {
        list($response, $httpCode) = self::request($meth, $url, $env, $params, $headers);

        return self::processResponse($response, $httpCode);
    }

    public static function request($meth, $url, $env, $params, $headers)
    {
        $curl = curl_init();
        $opts = [];
        if (ChargeBee_Request::GET == $meth) {
            $opts[CURLOPT_HTTPGET] = 1;
            if (count($params) > 0) {
                $encoded = http_build_query($params, null, '&');
                $url = "${url}?${encoded}";
            }
        } elseif (ChargeBee_Request::POST == $meth) {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = http_build_query($params, null, '&');
        } else {
            throw new Exception("Invalid http method ${meth}");
        }
        $url = self::utf8($env->apiUrl($url));
        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = ChargeBee_Environment::$connectTimeout;
        $opts[CURLOPT_TIMEOUT] = ChargeBee_Environment::$timeout;
        $userAgent = 'Chargebee-PHP-Client'.' v'.ChargeBee_Version::VERSION;

        $httpHeaders = self::addCustomHeaders($headers);
        array_push($httpHeaders, 'Accept: application/json', 'User-Agent: '.$userAgent); // Adding headers to array

        $opts[CURLOPT_HTTPHEADER] = $httpHeaders;
        $opts[CURLOPT_USERPWD] = $env->getApiKey().':';
        if (ChargeBee::getVerifyCaCerts()) {
            $opts[CURLOPT_SSL_VERIFYPEER] = true;
            $opts[CURLOPT_SSL_VERIFYHOST] = 2;
            $opts[CURLOPT_CAINFO] = ChargeBee::getCaCertPath();
        }
        curl_setopt_array($curl, $opts);

        $response = curl_exec($curl);

        if (false === $response) {
            $errno = curl_errno($curl);
            $curlMsg = curl_error($curl);
            $message = 'IO exception occurred when trying to connect to '.$url.' . Reason : '.$curlMsg;
            curl_close($curl);

            throw new ChargeBee_IOException($message, $errno);
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return [$response, $httpCode];
    }

    public static function addCustomHeaders($headers)
    {
        $httpHeaders = [];
        foreach ($headers as $key => $val) {
            array_push($httpHeaders, $key.': '.$val);
        }

        return $httpHeaders;
    }

    public static function processResponse($response, $httpCode)
    {
        $respJson = json_decode($response, true);
        if (!$respJson) {
            throw new Exception('Response not in JSON format. Might not be a ChargeBee Response.');
        }
        if ($httpCode < 200 || $httpCode > 299) {
            self::handleAPIRespError($httpCode, $respJson, $response);
        }

        return $respJson;
    }

    public static function handleAPIRespError($httpCode, $respJson, $response)
    {
        if (!isset($respJson['api_error_code'])) {
            throw new Exception("No api_error_code attribute in content. Probably not a ChargeBee's error response. The content is \n ".$response);
        }
        $type = 'unknown';
        if (isset($respJson['type'])) {
            $type = $respJson['type'];
        }
        if ('payment' == $type) {
            throw new ChargeBee_PaymentException($httpCode, $respJson);
        }
        if ('operation_failed' == $type) {
            throw new ChargeBee_OperationFailedException($httpCode, $respJson);
        }
        if ('invalid_request' == $type) {
            throw new ChargeBee_InvalidRequestException($httpCode, $respJson);
        }

        throw new ChargeBee_APIError($httpCode, $respJson);
    }
}
